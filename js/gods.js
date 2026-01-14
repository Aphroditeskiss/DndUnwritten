document.querySelectorAll(".god-tenets li").forEach(li => {
  li.addEventListener("mouseenter", () => {
    li.style.color = "var(--god-color)";
  });

  li.addEventListener("mouseleave", () => {
    li.style.color = "";
  });
});
