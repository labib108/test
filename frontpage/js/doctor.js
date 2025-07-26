document.addEventListener("DOMContentLoaded", async () => {
  try {
    const response = await fetch("http://localhost:8000/api/doctors/1");
    const contentType = response.headers.get("content-type");

    if (!contentType || !contentType.includes("application/json")) {
      throw new Error("Response is not JSON");
    }

    const doctor = await response.json();

    document.getElementById("doctorName").textContent = doctor.name;
    document.getElementById("doctorSpecialization").textContent = doctor.specialization;

  } catch (err) {
    console.error("Failed to fetch doctor:", err);
    alert("Error loading doctor data. Check API or CORS.");
  }
});
