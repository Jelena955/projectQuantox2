$(document).ready(function(){
    $("#morearticle").on("click", addarticle)

})
var br=2;

function addarticle(e){
    e.preventDefault();
    console.log(br)

    var ispis=` <hr/>
                <div class="mb-4" class="article" id="article">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name[]" class="form-control" placeholder="Name">
                    <label for="description" class="form-label">Name</label>
                    <input type="text" id="description" name="description[]" class="form-control" placeholder="description">
                    <label for="quantity" class="form-label">Discount</label>
                    <input type="text" id="quantity${br}" name="quantity[]" class="form-control" placeholder="quantity">
                    <label for="Price" class="form-label">Price</label>
                    <input type="text" id="price${br}" name="price[]" class="form-control" placeholder="price">
                    <label for="Discount" class="form-label">Discount</label>
                    <input type="text" id="discount${br}" name="discount[]" class="form-control" placeholder="Discount">
                    <label for="Itemtax" class="form-label">Item tax</label>
                    <input type="text" id="itemtax${br}" name="itemTax[]" class="form-control" placeholder="Item taxt">
                </div>`
    $("#articles").append(ispis)
    br++

}

