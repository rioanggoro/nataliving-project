document.addEventListener("DOMContentLoaded", function () {
    const input = document.getElementById("imageInput");
    const previewContainer = document.getElementById("preview-container");
    const deletedImageInput = document.getElementById("deleted_images");

    const warningText = document.getElementById("image-warning");
    const formatError = document.getElementById("format-error");
    const maxImageWarning = document.getElementById("max-image-warning");

    let selectedFiles = [];
    let deletedImageIds = [];

    input.addEventListener("change", function () {
        const newFiles = Array.from(this.files);
        let hasInvalidFile = false;
        let hasInvalidFormat = false;

        // Hitung jumlah total file termasuk yang baru
        const currentTotal =
            selectedFiles.length +
            previewContainer.querySelectorAll("[data-existing]").length;

        if (currentTotal + newFiles.length > 5) {
            maxImageWarning.classList.remove("hidden");
            input.value = "";
            return;
        } else {
            maxImageWarning.classList.add("hidden");
        }

        newFiles.forEach((file) => {
            const exists = selectedFiles.some(
                (f) =>
                    f.name === file.name && f.lastModified === file.lastModified
            );
            const allowedTypes = ["image/jpeg", "image/png", "image/jpg"];

            if (!allowedTypes.includes(file.type)) {
                hasInvalidFormat = true;
                return;
            }

            if (file.size > 2 * 1024 * 1024) {
                hasInvalidFile = true;
                return;
            }

            if (!exists && selectedFiles.length < 5) {
                selectedFiles.push(file);
            }
        });

        this.value = "";
        renderPreviews();

        // Tampilkan/ Sembunyikan error
        warningText.classList.toggle("hidden", !hasInvalidFile);
        formatError.classList.toggle("hidden", !hasInvalidFormat);
    });

    function renderPreviews() {
        previewContainer
            .querySelectorAll('[data-new-preview="true"]')
            .forEach((el) => el.remove());

        selectedFiles.forEach((file, index) => {
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

                deleteBtn.onclick = () => {
                    selectedFiles.splice(index, 1);
                    renderPreviews();
                };

                wrapper.appendChild(img);
                wrapper.appendChild(deleteBtn);
                previewContainer.appendChild(wrapper);
            };
            reader.readAsDataURL(file);
        });

        const dataTransfer = new DataTransfer();
        selectedFiles.forEach((file) => dataTransfer.items.add(file));
        input.files = dataTransfer.files;
    }

    // Fungsi hapus gambar lama (DB)
    window.markImageForDeletion = function (imageId, buttonElement) {
        if (!deletedImageIds.includes(imageId)) {
            deletedImageIds.push(imageId);
        }

        const wrapper = buttonElement.closest("[data-id]");
        if (wrapper) wrapper.remove();

        deletedImageInput.value = deletedImageIds.join(",");
    };
});
