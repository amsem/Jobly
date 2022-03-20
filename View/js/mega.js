const test = document.querySelectorAll(".test");
const mega = document.querySelectorAll(".mega");

for (let i = 0; i < test.length; i++) {
  test[i].addEventListener("click", () => {
    mega[i].style.display = "block";
    test[i].innerHTML = "See Less";
  });
  test[i].addEventListener("blur", () => {
    mega[i].style.display = "none";
    test[i].innerHTML = "See More";
  });
}