
const keyframes = {
	opacity: [0, 1],
	transform: ['translateY(50px)', 'translateY(0)'],
};
const options = {
	duration: 1000,
	easing: "ease",
	fill: "forwards",
};


const floatingMotions = document.querySelectorAll('.floatingMotion');
const showElement = (entries, observer) => {
	entries.forEach((entry) => {
		if (entry.isIntersecting) {
			const element = entry.target;
			element.animate(keyframes, options);
			observer.unobserve(element);
		}
	});
};
floatingMotions.forEach((element) => {
	const elementObserver = new IntersectionObserver(showElement, {
		threshold: 0.5, // 50%以上が表示されたらコールバックを実行
	});
	elementObserver.observe(element);
});
