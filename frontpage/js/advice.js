document.getElementById("getAdvice").addEventListener("click", async () => {
  const name = document.getElementById("name").value.trim();
  const email = document.getElementById("email").value.trim();
  const caretype = document.getElementById("adviceType").value;

  if (!name || !email || !caretype) {
    alert("Please fill all the fields.");
    return;
  }

  try {
    const response = await fetch("http://localhost:8000/api/advice", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "Accept": "application/json"
      },
      body: JSON.stringify({ name, email, caretype })
    });

    if (!response.ok) {
      const errorData = await response.json();
      throw new Error(errorData.message || "Failed to send advice");
    }

    const data = await response.json();
    document.getElementById("responseMessage").innerText = "Advice sent successfully!";
    console.log("Success:", data);

  } catch (error) {
    console.error("Error:", error);
    document.getElementById("responseMessage").innerText = "Failed to send advice.";
  }
});
