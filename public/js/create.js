'use strict';

const add_btn = document.getElementById('add_btn');

add_btn.addEventListener("click", function () {
  const div1 = document.getElementById('items');
  const div2 = document.createElement('div');
  const div3 = document.createElement('div');
  const div4 = document.createElement('div');
  const div5 = document.createElement('div');

  div1.style.display = "";

  div2.setAttribute("class", "form-row mb-2 point");
  div3.setAttribute("class", "col-md-5");
  div4.setAttribute("class", "col-md-4 mt-2");
  div5.setAttribute("class", "col-md-3 text-center");
  
  const input_item_name = document.createElement("input");
  input_item_name.setAttribute("type", "text");
  input_item_name.setAttribute("name", "item_name[]");
  input_item_name.setAttribute("class", "form-control");
  
  const input_item_image = document.createElement("input");
  const image_label = document.createElement("label");
  input_item_image.setAttribute("type", "file");
  input_item_image.setAttribute("name", "image[]");
  input_item_image.setAttribute("id", "customFile");
  image_label.setAttribute("for", "customFile");
  
  const btn = document.createElement("span");
  btn.setAttribute("class", "btn btn-outline-danger delete_btn");
  btn.setAttribute("onclick", "remove()");
  btn.innerHTML = "取消";
  
  
  div1.appendChild(div2);
  div2.appendChild(div3);
  div2.appendChild(div4);
  div2.appendChild(div5);
  div3.appendChild(input_item_name);
  div4.appendChild(input_item_image);
  div4.appendChild(image_label);
  div5.appendChild(btn);
  
});


function remove() {
  let remove_items = document.getElementsByClassName('point');
  remove_items = Array.from(remove_items);
  for (var i = remove_items.length - 1; i >= 0; i--) {
    
    remove_items[i].addEventListener("click", function () {
      this.remove();
    });
  }
}