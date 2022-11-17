function toast({
    title = '',
    message = '',
    type = '',
    duration = 3000 }) {

    const main = document.querySelector('body');
    const checkBox = document.querySelector('#toast')
    const toast = document.createElement('div');

    const autoRemoveId = setTimeout(function () {
        checkBox.removeChild(toast);
    }, duration + 1000);

    toast.onclick = function (e) {
        if (e.target.closest('.toast__close')) {
            checkBox.removeChild(toast);
            clearTimeout(autoRemoveId);
        }
    }
    const icons = {
        success: 'fa-solid fa-circle-check',
        warning: 'fa-solid fa-triangle-exclamation',
        error: 'fa-solid fa-circle-exclamation',
    }
    const delay = (duration / 1000).toFixed(2);
    const icon = icons[type];
    toast.classList.add('toast', `toast--${type}`, 'flex', 'items-center', 'bg-white', 'py-3', 'mb-1', 'shadow-lg', 'border-l-4', 'rounded-sm');
    toast.style.animation = `slideInLeft linear .3s, fadeOut linear 1s ${delay}s forwards`;
    toast.innerHTML = `
            <div class="toast__icon px-4 text-2xl">
                <i class="${icon}"></i>
            </div>
            <div class="toast__body flex-grow">
                <h3 class="toast__title font-semibold leading-5">${title}</h3>
                <p class="toast__msg leading-4 text-xs text-gray-400">${message}</p>
            </div>
            <div class="toast__close px-4 text-lg opacity-50">
                <i class="fa-solid fa-xmark"></i>
            </div>`;
    if (!checkBox) {
        clearTimeout(autoRemoveId);
        const box = document.createElement('div');
        box.classList.add('fixed', 'right-5', 'top-3', 'z-auto');
        box.setAttribute('id', 'toast');
        box.appendChild(toast);
        const autoRemoveIds = setTimeout(function () {
            box.removeChild(toast);
        }, duration + 1000);

        toast.onclick = function (e) {
            if (e.target.closest('.toast__close')) {
                box.removeChild(toast);
                clearTimeout(autoRemoveIds);
            }
        }
        main.appendChild(box);
        return;
    }
    checkBox.appendChild(toast);
}