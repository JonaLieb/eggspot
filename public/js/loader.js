function startLoader() {
    document.getElementById("page-loader").classList.add("active");
}

function stopLoader(callback) {

    const loader = document.getElementById("page-loader");

    if (!loader.classList.contains("active")) {
        // already inactive, just run callback
        if (callback) callback();
        return;
    }

    function handleTransitionEnd(e) {

        if (e.target !== loader) return;

        loader.removeEventListener("transitionend", handleTransitionEnd);

        if (callback) {
            callback();
        }
    }

    loader.addEventListener("transitionend", handleTransitionEnd);

    loader.classList.remove("active");

    // fallback in case transitionend never fires
    setTimeout(() => {
        loader.removeEventListener("transitionend", handleTransitionEnd);
        if (callback) callback();
    }, 400);
}
