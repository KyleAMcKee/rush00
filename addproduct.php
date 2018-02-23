<?php

//Check for admin privileges
if ($SESSION['priv'] != 1)
{
    header("Location: index.php?access=denied");
    exit();
}
//Input empty
if (isset($_POST['submit']))
{
    if (empty($_POST['name']))
    {
        header("Location: manageinv.php?manageinv=empty");
        exit();
    }
    if ($_POST['submit'] == 'add' || $_POST['submit'] == 'modify')
    {
        
        if (empty($_POST['price']) || empty($_POST['desc']))
        {
            header("Location: manageinv.php?manageinv=empty");
            exit();
        }
    }
}

//ADD
if (isset($_POST['submit']) && $_POST['submit'] == 'add')
{

    //Check if datafolder exists
    if (!file_exists('../data'))
        mkdir('../data');
 
    //Check if product file exists
    if (!file_exists('../data/products'))
        file_put_contents('../data/products', null);

    //Unserialize products arary
    $products = unserialize(file_get_contents('../data/products'));
    
    $product = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    
    //Check if product exists in database
    $item_exists = FALSE;
    if ($products)
    {
        foreach($products as $key => $value)
        {
            if ($value['name'] === $product)
                $item_exists = TRUE;
                
        }
    }
    
    //Return to inventory management page if item is already in DB
    if ($item_exists === TRUE)
    {
        header("Location: manageinv.php?manageinv=productexists");
        exit();
    }

    //Add item to DB
    $temp['name'] = $product;
    $temp['price'] = $price;  
    $temp['desc'] = $desc;  
    $products[] = $temp;
    $products = serialize($products);
    file_put_contents('../data/products', $products);
    header("Location: manageinv.php?manageinv=success");
    exit();
}

//DELETE
else if (isset($_POST['submit']) && $_POST['submit'] == 'delete')
{
    $product = $_POST['name'];
    //Unserialize products arary
    $products = unserialize(file_get_contents('../data/products'));

    //Check if product exists in database
    $item_exists = FALSE;
    $item_found;
    if ($products)
    {
        foreach($products as $key => $value)
        {
            if ($value['name'] === $product)
            {
                $item_found = $key;
                $item_exists = TRUE;
            }
        }
    }
    
    //Return to inventory management page if item doesn't exist
    if ($item_exists === FALSE)
    {
        header("Location: manageinv.php?manageinv=nosuchproduct");
        exit();
    }
    
    //Remove item from array and serialize it
    unset($products[$item_found]);
    $products = serialize($products);
    file_put_contents('../data/products', $products);
    header("Location: manageinv.php?manageinv=itemdeleted");
    exit();
}

//MODIFY
else if (isset($_POST['submit']) && $_POST['submit'] == 'modify')
{
    //Unserialize products arary
    $products = unserialize(file_get_contents('../data/products'));
    
    $product = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];

     //Check if product exists in database
     $item_exists = FALSE;
     $item_found;
     if ($products)
     {
         foreach($products as $key => $value)
         {
             if ($value['name'] === $product)
             {
                 $item_found = $key;
                 $item_exists = TRUE;
             }
         }
     }
     
     //Return to inventory management page if item doesn't exist
     if ($item_exists === FALSE)
     {
         header("Location: manageinv.php?manageinv=nosuchproduct");
         exit();
     }
    
    //Update item
    $products[$item_found]['price'] = $price;
    $products[$item_found]['desc'] = $desc;
    $products = serialize($products);
    file_put_contents('../data/products', $products);
    header("Location: manageinv.php?manageinv=success");
    exit();
}
else
    header("Location: index.php");
    exit();
?>