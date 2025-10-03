document.addEventListener('DOMContentLoaded', ()=> {
  window.showToast = (msg, type='success') => {
    const toast = document.createElement('div');
    toast.className = `toast align-items-center text-bg-${type === 'error' ? 'danger' : 'success'} border-0`;
    toast.style.position = 'fixed';
    toast.style.bottom = '80px';
    toast.style.right = '16px';
    toast.style.zIndex = '1060';
    toast.innerHTML = `<div class="d-flex"><div class="toast-body">${msg}</div><button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button></div>`;
    document.body.appendChild(toast);
    setTimeout(()=> toast.remove(), 3500);
  };
});