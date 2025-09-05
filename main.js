document.querySelectorAll(".toggle-btn").forEach((button) => {
  button.addEventListener("click", () => {
    const taskId = button.getAttribute("data-id");

    fetch("TaskManager/toggle.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: "id=" + taskId,
    })
      .then((response) => response.text())
      .then((data) => {
        button.parentElement.querySelector("span.status").textContent = data;
      });
  });
});

document.querySelectorAll(".delete-btn").forEach((button) => {
  button.addEventListener("click", () => {
    const taskId = button.getAttribute("data-id");

    fetch("./TaskManager/delete.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: "id=" + taskId,
    })
      .then((response) => response.text())
      .then((data) => {
        if (data === "success") {
          button.parentElement.remove();
        } else {
          alert("Failed to delete task.");
        }
      });
  });
});
