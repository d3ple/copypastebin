

const setCurrentAccessTypeForSelectors = () => {
    const accessTypeSelectors = document.querySelectorAll('.selected-access-type');

    accessTypeSelectors.forEach((accessTypeSelector) => {
        const accessTypeSelectorValue = accessTypeSelector.getAttribute('curvalue');
        const targetOption = accessTypeSelector.querySelector(`option[value="${accessTypeSelectorValue}"]`);
        targetOption.setAttribute("selected", "");
    });
};


const transformSyntaxTypeFields = () => {
    const syntaxTypeFields = document.querySelectorAll('.syntax-type-field');

    syntaxTypeFields.forEach((syntaxTypeField) => {
        if(syntaxTypeField.innerHTML === "text hljs") {
            syntaxTypeField.innerHTML = "plain text";
        }
    });
};


const transformExpirationTimeFields = () => {
    const expirationTimeFields = document.querySelectorAll('.expiration-time-field');

    expirationTimeFields.forEach((expirationTimeField) => {
        if(expirationTimeField.innerHTML === "0000-01-01 00:00:00") {
            expirationTimeField.innerHTML = "never";
        }
    });
};


const doAfterSubmit = () => {
    const submitForm = document.getElementById("submitForm");
    const submitBtn = document.getElementById("submitBtn");

    if(submitForm.reportValidity()) {
        submitBtn.classList.add("is-loading");
    }
};


