const posts = [...document.getElementsByClassName('post')];
const btnLeft = document.getElementById('btnLeft');
const btnRight = document.getElementById('btnRight');

console.log(posts);

let page = 0;
const minPage = 0;
const maxPage = posts.length % 4;

console.log(maxPage);

const changePage = () => {
	page = Math.min(maxPage, Math.max(page, minPage));
	posts.forEach((post) => {
		post.style.transform = `translateY(-${512 * page}px)`;
	});
};

btnLeft.addEventListener('click', (e) => {
	// console.log(1);
	// e.preventDefault();
	page -= 1;
	changePage();
});

btnRight.addEventListener('click', (e) => {
	// console.log(1);
	// e.preventDefault();
	page += 1;
	changePage();
});
