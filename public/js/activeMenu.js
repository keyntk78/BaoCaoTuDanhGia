const urlOrigin = window.location.origin;
// Remove parameters or anchor
let currentUrl = window.location.href.split(/[?#]/)[0];
// Remove domain
currentUrl = window.location.href.replace(urlOrigin, '');
// Remove trailing slash
currentUrl = currentUrl.replace(/\/$/, '');
$('.menu-item .menu-item-link').each((i, el) => {
    if ($(el).attr('href')) {
        const href = $(el).attr('href').replace(urlOrigin, '');
        if ((currentUrl.includes(href) && href !== '') || (href === '' && currentUrl === '')) {
            $(el).parent().addClass('active');
        }
    }
});
