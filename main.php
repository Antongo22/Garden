<!DOCTYPE HTML>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Garden</title>
 </head>
<body>

    <style>
    <?php include 'index.css'; ?>
    </style>

    <?php

    // Создаём класс яблони

    class AppleTree {

        //  Создаём переменные количества яблок и номера дерева, а также масив с весом.

        public $apples_count;
        public $tree_index;
        public $apples_weight_array;

    }

    // Создаём класс груши

    class PearTree {

        //  Создаём переменные количества груш и номера дерева, а также масив с весом.

        public $pears_count;
        public $tree_index;
        public $pears_weight_array;

    }

    // Создаем функцию подсчёта веса фруктов
    
    function Counter($type,$i,$apples_array,$pears_array){

        // Узнаём тип фрукта

        switch ($type){

            // 0 - яблоко, 1 - груша

            case 0:
                for ($j = 1; $j < $apples_array->apples_count+1; $j++){
                    $apples_array->apples_weight_array[$j] = rand(150,180);
                }

                global $apples_weight;
                $apples_weight[$i] = array_sum($apples_array->apples_weight_array)/1000;

                break;
            
            case 1:
                for ($j = 1; $j < $pears_array->pears_count+1; $j++){
                    $pears_array->pears_weight_array[$j] = rand(130,170);
                }

                global $pears_weight;
                $pears_weight[$i] = array_sum($pears_array->pears_weight_array)/1000;

                break;

        }
    }

    // Функция вывода таблицы

    function TableView($apples_array,$pears_array,$apples_weight,$pears_weight){

        for ($i = 1; $i < 11; $i++){
            echo "<tr>";
            echo "<td>".$apples_array[$i]->tree_index."</>";
            echo "<td>Apple</td>";
            echo "<td>".$apples_array[$i]->apples_count."</td>";
            echo "<td>".$apples_weight[$i]."</td>";
            echo "</tr>";
        }

        for ($i = 1; $i < 16; $i++){
            echo "<tr>";
            echo "<td>".$pears_array[$i]->tree_index."</td>";
            echo "<td>Pear</td>";
            echo "<td>".$pears_array[$i]->pears_count."</td>";
            echo "<td>".$pears_weight[$i]."</td>";
            echo "</tr>";
        }

    }

    // Посадка яблонь

    for ($i = 1; $i < 11; $i++){
        $apples_array[$i] = new AppleTree(); 
        $apples_array[$i]->apples_count = rand(40,50);
        $apples_array[$i]->tree_index = $i;
        $apples_array[$i]->apples_weight_array[0] = 0;

        global $apples_counter;
        $apples_counter += $apples_array[$i]->apples_count;

        Counter(0, $i, $apples_array[$i], 0);

    }


    // Посадка груш

    for ($i = 1; $i < 16; $i++){
        $pears_array[$i] = new PearTree(); 
        $pears_array[$i]->pears_count = rand(0,20);
        $pears_array[$i]->tree_index = 10+$i;
        $pears_array[$i]->pears_weight_array[0] = 0;

        global $pears_counter;
        $pears_counter += $pears_array[$i]->pears_count;

        Counter(1, $i, 0, $pears_array[$i]);

    }

    ?>

    <! -- Вывод конечной таблицы -->    

    <table class="table">
        <thead>
            <tr>
                <th>Tree index</th>
                <th>Tree name</th>
                <th>Number of fruits</th>
                <th>Fruit weight</th>
            </tr>
        </thead>
        <tbody>
            <?php           
                TableView($apples_array,$pears_array,$apples_weight,$pears_weight);
            ?>
        </tbody>
    </table>

    <! -- Вывод итоговой таблицы --> 

    <table class="table">
        <thead>
            <tr>
                <th>Tree name</th>
                <th>Total number of fruits</th>
                <th>Total fruit weight</th>
            </tr>
        </thead>
        <tbody>
            <?php
                echo "<tr>";
                echo "<td>Apple</td>";
                echo "<td>".$apples_counter."</td>";
                echo "<td>".array_sum($apples_weight)."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Pear</td>";
                echo "<td>".$pears_counter."</td>";
                echo "<td>".array_sum($pears_weight)."</td>";
                echo "</tr>";
            ?>
        </tbody>
</table>
</body>