<?php
$hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

//---  Define functions
// Filter array hotel based on parking value
$filteredHotels = array_filter($hotels, function($hotel){
    if(isset($_GET["parking"])){
        // Get dhe parking value and convert in boolean
        $parkng = $_GET["parking"]==="true"? true : false;
        return $hotel["parking"] === $parkng;
    } elseif(isset($_GET["rate"])){
        return $hotel["vote"] >= $_GET["rate"];
    } else {
        return $hotel;
    }    
});
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <!-- Meta data  -->
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='author' content='Orsol Filaj'>
    <meta name='description' content='PHP Hotel'>
    <!-- Title  -->
    <title>PHP Hotel</title>
    <!-- Link Bootstrap Css -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'>
    <!-- Link Bootstrap icons  -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css'>
    <!-- Link font Awesome  -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css'
        integrity='sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=='
        crossorigin='anonymous' referrerpolicy='no-referrer'>

</head>

<body>
    <!-- Container  -->
    <div class='container mx-auto py-4'>
        <!-- header  -->
        <header class="group text-center bg-primary text-white rounded-2 p-3 my-3">
            <h1>Find your next stay</h1>
            <em class="text-warning">Search deals on hotels and much more...</em>
        </header>
        <!-- Main -->
        <main>
            <form action="index.php" method="get">
                <label for="parking">Parking space:</label>
                <select class="form-control w-25" name="parking" id="parking">
                    <option selected disabled>You need hotel with parking space</option>
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>
                <label for="rate">Ratings:</label>
                <select class="form-control w-25" name="rate" id="rate">
                    <option selected value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <button type="submit" class="btn btn-secondary">Search</button>
            </form>
            <!--Main Validation  -->
            <?php if(isset($filteredHotels)){?>
            <!-- Table details  -->
            <table class="table border border-2 shadow mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <!--Table header Validation  -->
                        <?php if(isset($filteredHotels[0])){?>
                        <!-- Get the keys in the first array using for head table dinamically  -->
                        <?php foreach(array_keys($filteredHotels[0]) as $key) { ?>
                        <th scope="col">
                            <?= strtoupper($key) ?>
                        </th>
                        <?php } ?>
                        <?php }elseif(isset($filteredHotels[2])){ ?>
                        <!-- Get the keys in the first array using for head table dinamically  -->
                        <?php foreach(array_keys($filteredHotels[2]) as $key) { ?>
                        <th scope="col">
                            <?= strtoupper($key) ?>
                        </th>
                        <?php } ?>
                        <?php }else{ ?>
                        <!-- Get the keys in the first array using for head table dinamically  -->
                        <?php foreach(array_keys($filteredHotels[3]) as $key) { ?>
                        <th scope="col">
                            <?= strtoupper($key) ?>
                        </th>
                        <?php } ?>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <!-- Using keys for the order list body and details of each hotel -->
                        <?php foreach($filteredHotels as $key => $hotel){ ?>
                        <th scope="row">
                            <?= ($key + 1) ?>
                        </th>
                        <td>
                            <strong><?= $hotel["name"] ?></strong>
                        </td>
                        <td>
                            <?= $hotel["description"] ?>
                        </td>
                        <td>
                            <?= $hotel["parking"]? "Yes": "No" ?>
                        </td>
                        <td>
                            <?= $hotel["vote"] ?>
                        </td>
                        <td>
                            <?= $hotel["distance_to_center"] ?>(km)
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>
            <?php }else{?>
            <h1 class="text-center text-danger">
                <?= "Empty filtered" ?>
            </h1>
            <?php } ?>
        </main>
    </div>
</body>

</html>