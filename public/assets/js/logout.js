const logoutUser = () => {
    fetch("/logout", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
    }).catch((error) => console.error("Logout gagal:", error));
};
