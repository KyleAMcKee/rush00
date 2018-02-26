<html>

<style>
    #progress {
    width: 1%;
    height: 50px;
    background-color: green;
    text-align: center;
    line-height: 30px;
    color: white;
    margin: 0 auto;
    }
}

}
</style>
<div id="progress">0%</div>
<br>
<button onclick="move()">Initialize Website</button>
<form method="POST" action="init.php">
    <button type="submit" name="submit"> View Website</button>
</form>
<script>
    function move() 
    {
        var elem = document.getElementById("progress"); 
        var width = 0;
        var id = setInterval(frame, 25);
        function frame() {
            if (width >= 100) {
                clearInterval(id);
            } else {
                width++; 
                elem.style.width = width + '%'; 
                elem.innerHTML = width * 1 + '%';
            }
        }
    }
</script>
<?php
    if (isset($_SUBMIT))
    {
        if (!file_exists('../data'))
            mkdir('../data');
        if (!file_exists('../data/passwd'))
            file_put_contents('../data/passwd', null);
        if (!file_exists('../data/products'))
            file_put_contents('../data/products', null);
        $products = 'a:22:{i:0;a:6:{s:4:"name";s:4:"Luna";s:5:"price";s:7:"1900.35";s:5:"stock";s:3:"124";s:4:"desc";s:10:"Guinea Pig";s:8:"category";a:3:{i:0;s:5:"Small";i:1;s:10:"Guinea-pig";i:2;s:3:"All";}s:5:"image";s:116:"https://userscontent2.emaze.com/images/a3779280-d487-446f-bda2-51c68b4859b6/55bf45ba-64c4-4915-97ca-e146983eef35.png";}i:1;a:6:{s:4:"name";s:3:"Ted";s:5:"price";s:5:"57.21";s:5:"stock";s:2:"98";s:4:"desc";s:4:"Bear";s:8:"category";a:3:{i:0;s:5:"Large";i:1;s:4:"Bear";i:2;s:3:"All";}s:5:"image";s:48:"http://pngimg.com/uploads/bear/bear_PNG23456.png";}i:2;a:6:{s:4:"name";s:6:"Millie";s:5:"price";s:6:"670.97";s:5:"stock";s:2:"57";s:4:"desc";s:3:"Cat";s:8:"category";a:3:{i:0;s:6:"Medium";i:1;s:15:"Low-maintenance";i:2;s:3:"All";}s:5:"image";s:100:"https://sad.hasbro.com/db7312c97e69f2aa2a48e9c156bbc05885942775/6ab3750075ca464c23d280b62d9611a9.png";}i:3;a:6:{s:4:"name";s:9:"Cinna-Bun";s:5:"price";s:6:"301.89";s:5:"stock";s:2:"45";s:4:"desc";s:6:"Rabbit";s:8:"category";a:3:{i:0;s:5:"Small";i:1;s:6:"Rabbit";i:2;s:3:"All";}s:5:"image";s:51:"http://pngimg.com/uploads/rabbit/rabbit_PNG3797.png";}i:4;a:6:{s:4:"name";s:5:"Maxie";s:5:"price";s:6:"190.74";s:5:"stock";s:3:"985";s:4:"desc";s:4:"Bear";s:8:"category";a:4:{i:0;s:5:"Small";i:1;s:4:"Bear";i:2;s:15:"Low-maintenance";i:3;s:3:"All";}s:5:"image";s:60:"http://hansacreation.com/wp-content/uploads/2017/04/7040.png";}i:5;a:6:{s:4:"name";s:6:"Shadow";s:5:"price";s:6:"1810.5";s:5:"stock";s:3:"254";s:4:"desc";s:3:"Dog";s:8:"category";a:3:{i:0;s:3:"Dog";i:1;s:6:"Medium";i:2;s:3:"All";}s:5:"image";s:91:"http://pedigreedoghealth.org/wp-content/uploads/2009/11/DobermanPinscher_cutout-777x437.png";}i:6;a:6:{s:4:"name";s:6:"Mitten";s:5:"price";s:7:"3290.96";s:5:"stock";s:4:"5822";s:4:"desc";s:3:"Cat";s:8:"category";a:3:{i:0;s:3:"Cat";i:1;s:6:"Medium";i:2;s:3:"All";}s:5:"image";s:56:"http://ericsteinborn.com/github-for-cats/img/forcats.png";}i:7;a:6:{s:4:"name";s:6:"Archie";s:5:"price";s:7:"4091.63";s:5:"stock";s:3:"223";s:4:"desc";s:3:"Dog";s:8:"category";a:3:{i:0;s:3:"Dog";i:1;s:6:"Medium";i:2;s:3:"All";}s:5:"image";s:76:"https://i.pinimg.com/originals/13/ea/3f/13ea3fa0154ffa85097d78ffc3562409.png";}i:8;a:6:{s:4:"name";s:5:"Oscar";s:5:"price";s:7:"3132.58";s:5:"stock";s:3:"258";s:4:"desc";s:3:"Dog";s:8:"category";a:3:{i:0;s:3:"Dog";i:1;s:6:"Medium";i:2;s:3:"All";}s:5:"image";s:66:"https://www.petrolfordogs.com/wp-content/uploads/2018/01/pup-1.png";}i:9;a:6:{s:4:"name";s:7:"Thumper";s:5:"price";s:6:"1221.2";s:5:"stock";s:2:"75";s:4:"desc";s:6:"Rabbit";s:8:"category";a:3:{i:0;s:5:"Small";i:1;s:6:"Rabbit";i:2;s:3:"All";}s:5:"image";s:85:"https://orig00.deviantart.net/ab9f/f/2014/164/5/0/cute_bunny__by_lovemayu-d7maayp.png";}i:10;a:6:{s:4:"name";s:7:"Nibbles";s:5:"price";s:5:"54.25";s:5:"stock";s:3:"248";s:4:"desc";s:6:"Rabbit";s:8:"category";a:3:{i:0;s:5:"Small";i:1;s:6:"Rabbit";i:2;s:3:"All";}s:5:"image";s:47:"http://www.pngmart.com/files/1/White-Rabbit.png";}i:11;a:6:{s:4:"name";s:5:"Daisy";s:5:"price";s:4:"3799";s:5:"stock";s:3:"245";s:4:"desc";s:6:"Rabbit";s:8:"category";a:4:{i:0;s:5:"Small";i:1;s:6:"Rabbit";i:2;s:15:"Low-maintenance";i:3;s:3:"All";}s:5:"image";s:63:"https://douglascuddletoy.com/wp-content/uploads/2017/03/638.png";}i:12;a:6:{s:4:"name";s:4:"Teri";s:5:"price";s:7:"1089.65";s:5:"stock";s:2:"78";s:4:"desc";s:4:"Bear";s:8:"category";a:3:{i:0;s:4:"Bear";i:1;s:5:"Large";i:2;s:3:"All";}s:5:"image";s:57:"http://pngimg.com/uploads/polar_bear/polar_bear_PNG30.png";}i:13;a:6:{s:4:"name";s:5:"Ashes";s:5:"price";s:7:"1315.97";s:5:"stock";s:3:"365";s:4:"desc";s:3:"Cat";s:8:"category";a:3:{i:0;s:3:"Cat";i:1;s:6:"Medium";i:2;s:3:"All";}s:5:"image";s:139:"https://www.norsahkennels.co.za/images/Durbanville_Cattery_Cape_Town/Cat_Hotel_in_Northern_Suburbs_Cape_Town_NORSAH_Kennels_and_Cattery.png";}i:14;a:6:{s:4:"name";s:5:"Penny";s:5:"price";s:6:"330.26";s:5:"stock";s:3:"135";s:4:"desc";s:10:"Guinea Pig";s:8:"category";a:3:{i:0;s:5:"Small";i:1;s:10:"Guinea-pig";i:2;s:3:"All";}s:5:"image";s:83:"https://boylespethousing.co.uk/wp-content/uploads/revslider/homepage1/guineapig.png";}i:15;a:6:{s:4:"name";s:4:"Milo";s:5:"price";s:5:"209.8";s:5:"stock";s:3:"692";s:4:"desc";s:3:"Dog";s:8:"category";a:4:{i:0;s:5:"Small";i:1;s:3:"Dog";i:2;s:15:"Low-maintenance";i:3;s:3:"All";}s:5:"image";s:113:"https://cdn.shopify.com/s/files/1/0208/6788/products/t600_c1ea9a83c3371b657d8816e9cdbfa944_large.png?v=1402012754";}i:16;a:6:{s:4:"name";s:6:"Fluffy";s:5:"price";s:6:"334.29";s:5:"stock";s:2:"87";s:4:"desc";s:10:"Guinea Pig";s:8:"category";a:3:{i:0;s:5:"Small";i:1;s:10:"Guinea-pig";i:2;s:3:"All";}s:5:"image";s:48:"http://kindersay.com/files/images/guinea-pig.png";}i:17;a:6:{s:4:"name";s:7:"Chester";s:5:"price";s:7:"1489.61";s:5:"stock";s:2:"78";s:4:"desc";s:3:"Cat";s:8:"category";a:3:{i:0;s:3:"Cat";i:1;s:6:"Medium";i:2;s:3:"All";}s:5:"image";s:84:"https://vet.osu.edu/vmc/sites/default/files/images/CTO/Cats/iStock_cat%20sitting.png";}i:18;a:6:{s:4:"name";s:5:"Ollie";s:5:"price";s:7:"1403.25";s:5:"stock";s:2:"63";s:4:"desc";s:3:"Dog";s:8:"category";a:3:{i:0;s:3:"Dog";i:1;s:6:"Medium";i:2;s:3:"All";}s:5:"image";s:101:"https://images.wagwalkingweb.com/media/breed/shiba-inu/appearance/shiba-inu.png?auto=compress&fit=max";}i:19;a:6:{s:4:"name";s:7:"Paw Paw";s:5:"price";s:7:"2181.12";s:5:"stock";s:2:"57";s:4:"desc";s:4:"Bear";s:8:"category";a:3:{i:0;s:4:"Bear";i:1;s:5:"Large";i:2;s:3:"All";}s:5:"image";s:48:"http://pngimg.com/uploads/bear/bear_PNG23443.png";}i:20;a:6:{s:4:"name";s:5:"Sonya";s:5:"price";s:7:"3030.74";s:5:"stock";s:3:"854";s:4:"desc";s:4:"Bear";s:8:"category";a:4:{i:0;s:4:"Bear";i:1;s:5:"Small";i:2;s:15:"Low-maintenance";i:3;s:3:"All";}s:5:"image";s:60:"http://hansacreation.com/wp-content/uploads/2017/04/7042.png";}i:21;a:6:{s:4:"name";s:6:"Willow";s:5:"price";s:7:"2099.38";s:5:"stock";s:2:"54";s:4:"desc";s:10:"Guinea Pig";s:8:"category";a:4:{i:0;s:5:"Small";i:1;s:10:"Guinea-pig";i:2;s:15:"Low-maintenance";i:3;s:3:"All";}s:5:"image";s:76:"https://i.pinimg.com/originals/fb/80/62/fb80622bceeedb85eebc7ef80292b578.png";}}';
        $users = 'a:1:{i:0;a:6:{s:5:"first";s:5:"admin";s:4:"last";s:5:"admin";s:5:"email";s:15:"admin@admin.com";s:3:"uid";s:5:"admin";s:3:"pwd";s:60:"$2y$10$CXAO3moBklB9K7ULG2yPo.rlO4yGJNf/mZWxEqqoSbZlJY/qzz5c.";s:4:"priv";s:3:"yes";}}';
        file_put_contents('../data/products', $products);
        file_put_contents('../data/passwd', $users);
        header("Location: index.php");
        exit();
    }
?>

</html>

