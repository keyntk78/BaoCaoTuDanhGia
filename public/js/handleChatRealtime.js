const _token = $('meta[name="csrf-token"]').attr('content');
const baoCaoId = $('#bao-cao-id').text();
const userId = $('#user-id').text();
const initMessages = getInitMessages();

function getInitMessages() {
    var remote;
    $.ajax({
        type: "POST",
        url: '/binhluan/show',
        async: false,
        data: {
            id: baoCaoId,
            _token
        },
        success: (data) => {
            remote = data;
        },
    });
    remote.forEach((item) => {
        item = formatDate(item);
        item.child_binh_luan.forEach((childItem) => {
            childItem = formatDate(childItem);
        })
    })
    return remote;
}
new Vue({
    el: ".app-chat-realtime",
    data() {
        return {
            id: userId,
            message: "",
            replyMessage: "",
            users: [],
            messages: initMessages,
            room: "",
            activeClass: 'd-block',
            active: null,
            activeEdit: null,
            activeDelete: null,
            tempMessage: "",
        }
    },
    methods: {
        sendMessage() {
            var formData = new FormData();
            var attach_file = document.querySelector('#attach_file');

            formData.append("attach_file", attach_file.files[0]);
            formData.append("message", this.message);
            formData.append("baoCao_id", baoCaoId);

            axios.post('/binhluan/store', formData, {
                headers: {
                  'Content-Type': 'multipart/form-data'
                },
            })

           $('#attach_file').val('');

            this.message = ""
        },
        sendReplyMessage() {
            axios.post('/binhluan/storeReply', {
                message: this.replyMessage,
                baoCao_id: baoCaoId,
                parent_id: this.active
            })
            this.replyMessage = ""
        },
        showReplyInput(i) {
            if (this.active === i) {
                this.active = null;
            } else {
                this.active = i;
            }
        },
        sendEditMessage() {
            axios.post('/binhluan/updateMessage', {
                message: this.tempMessage,
                binhLuan_id: this.activeEdit,
                baoCao_id: baoCaoId
            })
            this.tempMessage = "",
            this.activeEdit = null
        },
        showEditInput(i, message) {
            if (this.activeEdit === i) {
                this.activeEdit = null;
            } else {
                this.activeEdit = i;
                this.tempMessage = message;
            }
        },
        deleteMessage() {
            axios.post('/binhluan/deleteMessage', {
                binhLuan_id: this.activeDelete,
                baoCao_id: baoCaoId
            })
            this.activeDelete = null
        },
        showModelDelete(i) {
            if (this.activeDelete === i) {
                this.activeDelete = null;
            } else {
                this.activeDelete = i;
            }
            $('.btn-show-modal-del').click();
        }
    },
    mounted() {
        const echo = new Echo({
            broadcaster: "socket.io",
            host: window.location.hostname + ':6001',
        })
        echo.join('room.' + baoCaoId)
            .listen('MessageSent', (event) => {
                event.binhLuan = formatDate(event.binhLuan);
                if (event.action === 'isReply') {
                    this.messages.forEach((message, _index) => {
                        if (event.binhLuan.parent_id === message.id) {
                            message.child_binh_luan.push(event.binhLuan);
                            eventTooltip()
                        }
                    });
                }
                else if (event.action === 'isUpdate') {
                    this.messages.forEach((message, _index) => {
                        if (event.binhLuan.id === message.id) {
                            message.noiDung = event.binhLuan.noiDung;
                            message.updated_at = event.binhLuan.updated_at;
                            eventTooltip()
                        }
                        message.child_binh_luan.forEach((childMessage, _index) => {
                            if (event.binhLuan.id === childMessage.id) {
                                childMessage.noiDung = event.binhLuan.noiDung;
                                childMessage.updated_at = event.binhLuan.updated_at;
                                eventTooltip()
                            }
                        })
                    });
                } else if (event.action === 'isDelete') {
                    this.messages.forEach((message, _index) => {
                        if (event.binhLuan.id === message.id) {
                            this.messages.splice(_index, 1);
                            eventTooltip()
                        }
                        message.child_binh_luan.forEach((childMessage, _index) => {
                            if (event.binhLuan.id === childMessage.id) {
                                message.child_binh_luan.splice(_index, 1);
                                eventTooltip()
                            }
                        })
                    });
                } else {
                    this.messages.push(event.binhLuan);
                    eventTooltip()
                }
            });
    },
})

function eventTooltip() {
    $('[data-toggle="tooltip"]').tooltip()
}
eventTooltip()

function formatDate(item) {
    const dates = new Date(item.updated_at);
    const year = (dates.getYear() + 1900).toString();
    const month = '0' + (dates.getMonth() + 1).toString();
    const date = dates.getDate().toString();
    const hours = dates.getHours().toString();
    const minutes = dates.getMinutes().toString();
    const dateString = year + month + date + hours + minutes;
    item.time = moment(dateString, "YYYYMMDDHm").fromNow();
    item.timeNum = moment(dates).format('LLL');
    return item;
}
