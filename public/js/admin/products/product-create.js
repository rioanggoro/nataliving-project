document.addEventListener("DOMContentLoaded", function () {
    const input = document.getElementById("imageInput");
    const previewContainer = document.getElementById("preview-container");
    const warningText = document.getElementById("image-warning");
    const formatError = document.getElementById("format-error");

    input.addEventListener("change", function () {
        const files = Array.from(this.files);
        const currentPreviewCount =
            previewContainer.querySelectorAll("[data-new-preview]").length;
        let hasInvalidFile = false;
        let hasInvalidFormat = false;

        if (currentPreviewCount + files.length > 5) {
            document
                .getElementById("max-image-warning")
                .classList.remove("hidden");
            input.value = "";
            return;
        } else {
            document
                .getElementById("max-image-warning")
                .classList.add("hidden");
        }

        // Bersihkan peringatan
        warningText.classList.add("hidden");
        formatError.classList.add("hidden");

        files.forEach((file) => {
            const allowedTypes = ["image/jpeg", "image/png", "image/jpg"];

            // Cek ukuran file
            if (file.size > 2 * 1024 * 1024) {
                hasInvalidFile = true;
                return;
            }

            // Cek format
            if (!allowedTypes.includes(file.type)) {
                hasInvalidFormat = true;
                return;
            }

            const reader = new FileReader();
            reader.onload = (e) => {
                const wrapper = document.createElement("div");
                wrapper.className = "relative w-24 h-24 group";
                wrapper.setAttribute("data-new-preview", "true");

                const img = document.createElement("img");
                img.src = e.target.result;
                img.className = "w-full h-full object-cover rounded border";

                const deleteBtn = document.createElement("button");
                deleteBtn.innerHTML = "&times;";
                deleteBtn.className =
                    "absolute top-1 right-1 bg-red-600 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs hover:bg-red-700";
                deleteBtn.type = "button";
                deleteBtn.onclick = () => wrapper.remove();

                wrapper.appendChild(img);
                wrapper.appendChild(deleteBtn);
                previewContainer.appendChild(wrapper);
            };
            reader.readAsDataURL(file);
        });

        if (hasInvalidFile) {
            warningText.classList.remove("hidden");
        }
        if (hasInvalidFormat) {
            formatError.classList.remove("hidden");
        }
    });

    document.querySelector("form").addEventListener("reset", () => {
        previewContainer.innerHTML = "";
        document.getElementById("image-warning").classList.add("hidden");
        document.getElementById("format-error").classList.add("hidden");
    });
});

const deletedImageIds = [];

function markImageForDeletion(imageWrapper) {
    // Tambahkan ID ke list yang akan dihapus
    const imageId = imageWrapper.getAttribute("data-id");
    if (!deletedImageIds.includes(imageId)) {
        deletedImageIds.push(imageId);
    }

    // Sembunyikan/Remove image preview dari UI
    imageWrapper.remove();

    // Update hidden input
    document.getElementById("deleted_images").value = deletedImageIds.join(",");
}
