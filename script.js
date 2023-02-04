const addEducationButton = document.querySelector("#addEducationButton");
const educationContainer = document.querySelector("#educationContainer");

addEducationButton.addEventListener("click", function() {
  const educationSection = document.createElement("div");
  educationSection.classList.add("educationSection");

  const degreeInput = document.createElement("input");
  degreeInput.type = "text";
  degreeInput.id = "degree";
  degreeInput.required = true;
  
  const fieldInput = document.createElement("input");
  fieldInput.type = "text";
  fieldInput.id = "field";
  fieldInput.required = true;

  const institutionInput = document.createElement("input");
  institutionInput.type = "text";
  institutionInput.id = "institution";
  institutionInput.required = true;

  const startDateInput = document.createElement("input");
  startDateInput.type = "date";
  startDateInput.id = "start-date";
  startDateInput.required = true;

  const endDateInput = document.createElement("input");
  endDateInput.type = "date";
  endDateInput.id = "end-date";
  endDateInput.required = true;

  educationSection.innerHTML = `
    <label for="degree">Degree:</label>
    ${degreeInput.outerHTML}
    <br><br>
    <label for="field">Field of Study:</label>
    ${fieldInput.outerHTML}
    <br><br>
    <label for="institution">Institution:</label>
    ${institutionInput.outerHTML}
    <br><br>
    <label for="start-date">Start Date:</label>
    ${startDateInput.outerHTML}
    <br><br>
    <label for="end-date">End Date:</label>
    ${endDateInput.outerHTML}
    <br><br>
  `;

  educationContainer.appendChild(educationSection);
});
