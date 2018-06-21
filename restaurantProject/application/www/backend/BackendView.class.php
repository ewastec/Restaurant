<div class="backend">
    <h1>Welcome Admin !!!</h1>

    <div class="adminCategory">
        <h1>List of all categories</h1>
        

        <div>
        category name:
        category description:
        <button>Update Category</button>
        <button>Delete Category</button>
        </div>

        <button>Add Category</button>
    </div>
    <div class="adminProducts">
        <h1>All the products in entree category</h1>
        <button>Add product in entree category</button>
        <?php if(isset($entree)): ?>
        <?php //var_dump($entree); ?>
        <?php foreach($entree as $entre): ?>
        <div class="flex">

            <div>
            product name: <?= $entre['product_name']; ?>
            product description: <?= $entre['product_description']; ?>
            product price: <?= $entre['product_price']; ?>
            product picture: 
            product category: <?= $entre['product_category_name']; ?>
            <button>Update product</button>
            <button>Delete product</button>
            </div>

        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>

</div>