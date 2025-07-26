document.getElementById("showDoctorBtn").addEventListener("click", async () => {
  try {
    const response = await fetch("http://localhost:8000/api/doctors/1");
    const contentType = response.headers.get("content-type");

    console.log("Status:", response.status);
    console.log("Content-Type:", contentType);

    const text = await response.text();
    console.log("Raw Response:", text);

    if (!contentType || !contentType.includes("application/json")) {
      throw new Error("Response is not JSON");
    }

    const doctor = JSON.parse(text); // single object
    console.log("Parsed JSON:", doctor);

    const container = document.getElementById("doctorList");
    container.innerHTML = "";

    const div = document.createElement("div");
    div.className = "col-md-4";
    div.innerHTML = `
      <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title">${doctor.name}</h5>
          <p class="card-text">${doctor.specialization}</p>
        </div>
      </div>
    `;
    container.appendChild(div);

  } catch (err) {
    console.error("Failed to fetch doctors:", err);
    alert("Error loading doctor data. Check API or CORS.");
  }
});
