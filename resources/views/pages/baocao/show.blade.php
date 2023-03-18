@extends('layouts.index', ['title' => 'Chi tiết báo cáo'])

@php
$controller = (object) [
    'name' => 'Báo cáo',
    'href' => '/baocao',
];
$action = (object) [
    'name' => 'Chi tiết',
];
@endphp

@section('styles')
    <link rel="stylesheet" href="css/style-word.css">
    <style>
        .minhchung {
            display: block;
            text-decoration: none;
        }

        .media img {
            width: 60px;
            height: 60px;
        }

        .attach-file .other {
            margin-top: 10px;
            margin-bottom: 15px;
        }

        .attach-file .other .icon {
            width: 100px;
            float: left;
        }

        .attach-file .other .info {
            margin-top: 10px;
            width: calc(100% - 100px);
            float: right;
        }

        .attach-file .other .info p {
            margin-bottom: 5px;
        }

        .attach-file .other img {
            width: 100px;
            height: auto;
        }

        .attach-file .image {
            margin-top: 10px;
            width: 300px;
        }

        .attach-file .image img {
            width: 100%;
            height: auto;
        }

        .attach-file .video {
            margin-top: 10px;
            width: 500px;
            height: auto;
            aspect-ratio: 16/9;
        }

        .attach-file .video video {
            width: 100%;
        }

        .upload-file {
            height: 40px;
            width: 150px;
            position: absolute;
            right: 190px;
            overflow: hidden;
        }

        .upload-file > span {
            position: absolute;
            white-space: nowrap;
            width: 100%;
            top: 50%;
            transform: translateY(-50%);
            display: block;
            text-align: center;
            color: #1c7af1;
            z-index: 1;
        }

        .upload-file > span i.fas {
            padding-right: 5px;
        }

        #attach_file {
            position: relative;
            opacity: 0;
            cursor: pointer;
            z-index: 2;
        }
    </style>
@endsection

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('breadcrumb')
    @include('partials.breadcrumb', compact('controller', 'action'))
@endsection

@section('page-heading')
    @include('partials.page-heading', compact('controller', 'action'))
@endsection

@section('message')
    @include('partials.message', [
        'message' => Session::has('message') ? Session::get('message') : null,
    ])
@endsection

@section('content')
    {{-- Content --}}
    <div class="row">
        <div class="card shadow mb-4 col mx-3 p-0">
            <div class="wrap-word-content card-body p-5">
                <h3>Tiêu chí số {{ $baoCao->tieuChi->tieuChuan->stt }}.{{ $baoCao->tieuChi->stt }}. {{ $baoCao->tieuChi->ten }}</h3>
                @if ($baoCao->tieuChi->stt !== 0)
                <p class="h3">1. Mô tả hiện trạng</p>
                {!! $baoCao->moTa !!}
                <p class="h3">2. Điểm mạnh</p>
                {!! $baoCao->diemManh !!}
                <p class="h3">3. Điểm tồn tại</p>
                {!! $baoCao->diemTonTai !!}
                <p class="h3">4. Kế hoạch hành động</p>
                {!! $baoCao->keHoachHanhDong !!}
                <p class="h3">5. Tự đánh giá</p>
                <p>{!! $baoCao->diemTDG >= 4 ? 'Đạt' : 'Chưa đạt' !!} (Điểm TĐG: {!! $baoCao->diemTDG !!}/7)</p>
                @else
                <h3>Mở đầu</h3>
                {!! $baoCao->moDau !!}
                <h3>Kết luận</h3>
                {!! $baoCao->ketLuan !!}
                <h3>Số tiêu chí đạt</h3>
                <p>{!! $baoCao->soTCDat !!}</p>
                @endif
            </div>
            @can('baocao-sua', $baoCao->id)
            <div class="card-footer p-3">
                <div class="text-right">
                    <a href="{{ route('baocao.edit', ['id' => $baoCao->id]) }}" class="btn btn-secondary">Sửa</a>
                </div>
            </div>
            @endcan
        </div>
        @if ($baoCao->tieuChi->stt !== 0)
        <div class="mb-4 col-md-3 mx-2">
            <div class="card shadow">
                <div class="card-body py-5">
                    <h6 class="text-uppercase font-weight-bold text-dark text-center text-bold">Minh chứng sử dụng</h6>
                    <hr class="divider">
                    <ul class="list-minhchung pr-2 pl-4"></ul>
                </div>
            </div>
        </div>
        @endif
    </div>
    {{-- Backup --}}
    @if (count($baoCao->baoCaoSL) > 0 && $baoCao->trangThai == 0)
    <div class="card shadow mb-4 mx-1">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="m-0">DANH SÁCH SAO LƯU</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Ngày sao lưu</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($baoCao->baoCaoSL as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ date("d-m-Y H:i", strtotime($item->created_at)) }}</td>
                                <td>
                                    <a href="{{ route('baocaosaoluu.show', ['id' => $item->id]) }}"
                                        class="btn btn-primary">Xem chi tiết</a>
                                    <a href="{{ route('baocao.compare', ['id' => $baoCao->id, 'subid' => $item->id]) }}"
                                            class="btn btn-secondary">So sánh</a>
                                            <a href="#" class="btn btn-success btn-restore-backup" data-url="{{ route('baocaosaoluu.restore') }}"
                                            data-id="{{ $item->id }}"
                                            data-redirect="{{ route('baocao.show', ['id' => $item->baoCao_id]) }}">Phục hồi</a>
                                        <a href="#" class="btn btn-danger btn-delete-backup" data-url="{{ route('baocaosaoluu.destroy') }}"
                                            data-id="{{ $item->id }}"
                                            data-redirect="{{ route('baocao.show', ['id' => $item->baoCao_id]) }}">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
    {{-- Chat --}}
    <div class="app-chat-realtime card shadow mx-1">
        <div class="d-none" id="bao-cao-id">{{ $baoCao->id }}</div>
        <div class="d-none" id="user-id">{{ auth()->id() }}</div>
        <span class="sr-only" v-if="activeDelete"></span>
        <div class="card-body p-5">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-uppercase font-weight-bold text-dark text-center text-bold">
                        Nhận xét báo cáo
                    </h3>
                    <hr class="divider mt-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div v-if="messages.length">
                                <div v-for="(message, i) in messages">
                                    <div class="media mt-5">
                                        <img class="mr-3 rounded-circle border border-primary" alt="Avatar"
                                            v-bind:src="message.nguoi_dung.hinhAnh" />
                                        <div class="media-body">
                                            <div class="row">
                                                <div class="col-8 d-flex">
                                                    <h6><strong>@{{ message.nguoi_dung.hoTen }}</strong><small>
                                                            (@{{ message.nguoi_dung.chucVu }})</small><small data-toggle="tooltip"
                                                            data-placement="top" :title="message.timeNum">
                                                            (@{{ message.time }})</small></h6>
                                                </div>
                                                <div class="col-4 d-flex justify-content-end">
                                                    <div class="pull-right reply text-right" v-if="message.nguoiDung_id == {{ auth()->id() }}">
                                                        <button @click="showEditInput(message.id, message.noiDung)"
                                                            class="btn-sua btn-link text-success bg-transparent border-0"><span><i
                                                                    class="fa fa-pen"></i>
                                                                Sửa</span></button>
                                                    </div>
                                                    <div class="pull-right reply text-right" v-if="message.nguoiDung_id == {{ auth()->id() }}">
                                                        <button @click="showModelDelete(message.id)"
                                                            class="btn-xoa btn-link text-danger bg-transparent border-0"><span><i
                                                                    class="fa fa-times"></i>
                                                                Xóa</span></button>
                                                    </div>
                                                    <div class="pull-right reply text-right">
                                                        <button @click="showReplyInput(message.id)"
                                                            class="btn-phanhoi btn-link bg-transparent border-0"><span><i
                                                                    class="fa fa-reply"></i>
                                                                Phản hồi</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <span :class="message.id != activeEdit ? activeClass : 'd-none'">
                                                @{{ message.noiDung }}

                                                <div class="attach-file" v-if="message.dinhKem">
                                                    <div class="image" v-if="message.loai_dinhKem.indexOf('image') != -1">
                                                        <img v-bind:src="message.dinhKem">
                                                    </div>

                                                    <div class="video" v-else-if="message.loai_dinhKem.indexOf('video') != -1">
                                                        <video controls>
                                                            <source v-bind:src="message.dinhKem">
                                                        </video>
                                                    </div>

                                                    <div class="other" v-else>
                                                        <div class="icon">
                                                            <img src="img/file.png">
                                                        </div>

                                                        <div class="info">
                                                            <p>@{{ message.dinhKem }}</p>
                                                            <a v-bind:href="message.dinhKem" v-bind:download="message.dinhKem">Tải về</a>
                                                        </div>

                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </span>
                                            <span :class="message.id == activeEdit ? activeClass : 'd-none'">
                                                <div class="input-group mb-3">
                                                    <input v-model="tempMessage" @keyup.enter="sendEditMessage" class="form-control">
                                                    <div class="input-group-append">
                                                        <button @click="sendEditMessage" class="btn btn-primary">Lưu</button>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <button @click="showEditInput(message.id, message.noiDung)" class="btn btn-secondary">Hủy</button>
                                                    </div>
                                                </div>
                                            </span>
                                            <div class="mt-4"
                                                :class="message.id == active ? activeClass : 'd-none'">
                                                <div class="input-group mb-3">
                                                    <input v-model="replyMessage" @keyup.enter="sendReplyMessage"
                                                        class="form-control">
                                                    <div class="input-group-append">
                                                        <button @click="sendReplyMessage" class="btn btn-primary">Gửi phản
                                                            hồi</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div v-if="message.child_binh_luan.length">
                                                <div v-for="childMessage in message.child_binh_luan">
                                                    <div class="media mt-4">
                                                        <span class="pr-3"><img
                                                                class="rounded-circle border border-primary" alt="avatar"
                                                                v-bind:src="childMessage.nguoi_dung.hinhAnh" /></span>
                                                        <div class="media-body">
                                                            <div class="row">
                                                                <div class="col-8 d-flex">
                                                                    <h6><strong>@{{ childMessage.nguoi_dung.hoTen }}</strong><small>
                                                                            (@{{ childMessage.nguoi_dung.chucVu }})</small><small
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            :title="childMessage.timeNum">
                                                                            (@{{ childMessage.time }})</small></h6>
                                                                </div>
                                                                <div class="col-4 d-flex justify-content-end">
                                                                    <div class="pull-right reply text-right" v-if="childMessage.nguoiDung_id == {{ auth()->id() }}">
                                                                        <button @click="showEditInput(childMessage.id, childMessage.noiDung)"
                                                                            class="btn-sua btn-link text-success bg-transparent border-0"><span><i
                                                                                    class="fa fa-pen"></i>
                                                                                Sửa</span></button>
                                                                    </div>
                                                                    <div class="pull-right reply text-right" v-if="childMessage.nguoiDung_id == {{ auth()->id() }}">
                                                                        <button @click="showModelDelete(childMessage.id)"
                                                                            class="btn-xoa btn-link text-danger bg-transparent border-0"><span><i
                                                                                    class="fa fa-times"></i>
                                                                                Xóa</span></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <span :class="childMessage.id != activeEdit ? activeClass : 'd-none'">
                                                                @{{ childMessage.noiDung }}
                                                            </span>
                                                            <span :class="childMessage.id == activeEdit ? activeClass : 'd-none'">
                                                                <div class="input-group mb-3">
                                                                    <input v-model="tempMessage" @keyup.enter="sendEditMessage" class="form-control">
                                                                    <div class="input-group-append">
                                                                        <button @click="sendEditMessage" class="btn btn-primary">Lưu</button>
                                                                    </div>
                                                                    <div class="input-group-append">
                                                                        <button @click="showEditInput(childMessage.id, childMessage.noiDung)" class="btn btn-secondary">Hủy</button>
                                                                    </div>
                                                                </div>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div v-else>
                                <div class="text-center">Chưa có bình luận nào. Hãy gửi nhận xét đầu tiên của bạn để xây
                                    dựng báo cáo nhé!</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer px-5 py-4 text-right">
            <input @focus="active = null" v-model="message" @keyup.enter="sendMessage" class="form-control mb-4">

            <div class="upload-file">
                <span><i class="fas fa-paperclip"></i> Đính kèm file</span>
                <input id="attach_file" type="file" name="dinhKem">
            </div>

            <button @click="sendMessage" href="#" class="btn btn-primary">Gửi bình luận</button>
        </div>
        <button type="button" class="btn-show-modal-del btn btn-primary d-none" data-toggle="modal" data-target="#deleteBinhLuan">
            <span class="sr-only">Show modal</span>
        </button>
        <!-- Modal -->
        <div class="modal fade" id="deleteBinhLuan" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa bình luận</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">Bạn chắc chắn xóa bình luận này?</div>
                    <div class="modal-footer">
                        <button @click="deleteMessage" class="btn btn-primary" type="button" data-dismiss="modal">Xác nhận</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn-show-modal btn btn-primary d-none" data-toggle="modal" data-target="#deleteCatModal">
        <span class="sr-only">Show modal</span>
    </button>
    <!-- Modal -->
    <div class="modal fade" id="deleteCatModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Minh chứng thành phần</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="title"></h5>
                    <ul class="content"></ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/handleDelete.js"></script>
    <script src="js/handleRestore.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/vue/2.6.14/vue.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/socket.io/2.4.0/socket.io.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.11.0/echo.common.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/locale/vi.min.js"
        integrity="sha512-LvYVj/X6QpABcaqJBqgfOkSjuXv81bLz+rpz0BQoEbamtLkUF2xhPNwtI/xrokAuaNEQAMMA1/YhbeykYzNKWg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/handleDelete.js"></script>
    <script src="js/handleScrollToMinhChung.js"></script>
    <script src="js/handleChatRealtime.js"></script>
@endsection
