import zod from "zod";

const form = document.querySelector("form[validate]");

function validate(ev) {
    // Prevent default form submission
    ev.preventDefault();

    clearErrors();

    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());

    const validations = zod.object({
        title: zod
            .string()
            .min(1, "Title is required")
            .min(3, "Title must be at least 3 characters")
            .max(255, "Title must be less than 255 characters"),
        description: zod
            .string()
            .min(1, "Description is required")
            .max(1000, "Description must be less than 1000 characters"),
        salary: zod
            .number()
            .min(1, "Salary cannot be less than 0")
            .max(1000000, "Salary cannot be greater than 1000000"),
    });

    const result = validations.safeParse(data);

    if (!result.success) {
        renderErrorMessages(result);
    } else {
        form.submit();
    }
}

function clearErrors() {
    const errors = document.querySelectorAll(".error");
    errors.forEach((error) => error.remove());
}

function renderErrorMessages(result) {
    const errors = result.error.flatten();

    for (const key in errors.fieldErrors) {
        const error = errors.fieldErrors[key][0];
        const input = document.querySelector(`[name="${key}"]`);

        input?.insertAdjacentHTML(
            "afterend",
            `<div class="error text-sm text-red-500">${error}</div>`
        );
    }
}

form?.addEventListener("submit", validate);
