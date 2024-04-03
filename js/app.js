document.getElementById('logout-link').addEventListener('click', function (e) {
  e.preventDefault();
  // Tambahkan logika untuk proses log out di sini

  // Redirect ke halaman login setelah log out
  window.location.href = 'login.php';
});

let searchBox = document.querySelector('#search-box');
let images = document.querySelectorAll('.container .image-container .image');

searchBox.oninput = () => {
  images.forEach((hide) => (hide.style.display = 'none'));
  let value = searchBox.value;
  images.forEach((filter) => {
    let title = filter.getAttribute('data-title');
    if (value == title) {
      filter.style.display = 'block';
    }
    if (searchBox.value == '') {
      filter.style.display = 'block';
    }
  });
};
