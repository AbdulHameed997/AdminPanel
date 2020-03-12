function choice (ele) {
  var title = document.getElementById('textarea1')
  var description = document.getElementById('textarea2')
  var ytlink = document.getElementById("textarea3")
  var array1 = new array1(title, description, ytlink)

}
function add(type) {
  var element = document.createElement("input");

  element.setAttribute("type", type);
  element.setAttribute("value", type);
  element.setAttribute("name", type);

  var foo = document.getElementById("fooBar");
  foo.appendChild(element);
}
