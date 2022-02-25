btn = document.getElementById('menu');
block = document.getElementById('menu_block');

btn.addEventListener('click', (e) => {
	block.classList.toggle('menu_shown');
});
