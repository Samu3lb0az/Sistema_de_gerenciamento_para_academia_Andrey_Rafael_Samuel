document.addEventListener("DOMContentLoaded", function () {
    const backToTop = document.getElementById("backToTop");

    window.addEventListener("scroll", function () {
        if (window.scrollY > 300) {
            backToTop.classList.add("show");
            backToTop.classList.remove("hide");
        } else {
            backToTop.classList.add("hide");
            setTimeout(() => backToTop.classList.remove("show"), 300);
        }
    });

    backToTop.addEventListener("click", function () {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });
});
