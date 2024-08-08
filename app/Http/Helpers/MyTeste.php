<?php

namespace App\Http\Helpers;
use Illuminate\Support\Facades\DB;

class MyTeste {
    public function createTest($codserie) {
        //echo $codserie . " bla bla";
        //$tests = DB::select('SELECT * FROM tests WHERE codserie = ?', [$codserie]);
        $tests = DB::select('SELECT s.codserie, s.denumireserie, t.codtest, t.enunt, t.v1, t.v2, t.v3, t.v4, t.raspuns, t.calea 
        FROM serii s 
        JOIN tests t ON t.codserie = s.codserie WHERE s.codserie = ?', [$codserie]);

        //$selectedTests = $this->randomizeTests($tests);
        $selectedTests = $this->getRandomTests($tests); 
        //$this->randomizeTests($tests);
        //randomizeTests($tests);
        //echo '<br><br>';
        //print_r(json_encode($selectedTests));
        //echo '<br><br>';
        //return $selectedTests;
        $result = $this->randomizeAndMap(json_encode($selectedTests));

        // Print result
        // print_r(json_encode($result));
        return $result;
    }

    private function getRandomTests($data) {
        $randomTests = [];
        $numToSelect = 5;
        if (count($data) < $numToSelect) {
            while (count($randomTests) < $numToSelect) {
                foreach ($data as $element) {
                    if (count($randomTests) == 0 || end($randomTests) != $element) {
                        $randomTests[] = $element;
                        if (count($randomTests) == $numToSelect) {
                            break;
                        }
                    }
                }
            }
        } else {
            for ($i = 0; $i < $numToSelect; $i++) {
                $nextElement = null;
                do {
                    $randomNumber = rand(0, count($data) - 1);
                    $nextElement = $data[$randomNumber];
                } while (count($randomTests) > 0 && end($randomTests) == $nextElement);
                $randomTests[] = $nextElement;
            }
        }
        return $randomTests;
    }
    private function randomizeTests($data) {
        // This function is not used anymore because getRandomTests is used instead
        // Convert the data to an array if it is a collection
        if ($data instanceof \Illuminate\Support\Collection) {
            $data = $data->toArray();
        }
    
        // Extract 'codtest' values from the array of objects
        $codtestArray = array_map(function($item) {
            return $item->codtest;
        }, $data);
        //print_r($codtestArray);
    
        // Shuffle the array to randomize the elements
        shuffle($codtestArray);
    
        // Initialize the array for selected codtest values
        $randomTests = [];
    
        // Number of elements to select
        $numToSelect = 5;
       


        // Handle the case where the array has fewer elements than required
        if (count($codtestArray) < $numToSelect) {
            // Repeat elements to make up the count but avoid consecutive duplicates
            while (count($randomTests) < $numToSelect) {
                foreach ($codtestArray as $element) {
                   
                    // Ensure no consecutive duplicates
                    if (count($randomTests) == 0 || end($randomTests) != $element) {
                        $randomTests[] = $element;
                        if (count($randomTests) == $numToSelect) {
                            break;
                        }
                    }
                }

               
            }
        } else {
            // Select up to 5 elements, repeating if necessary but avoiding consecutive duplicates
            for ($i = 0; $i < $numToSelect; $i++) {
                $nextElement = null;
                //---------------
                // Must change the function because it is not working. I get only 2 values.
                echo "<br><br>";
                $randomNumber=rand(0,count($codtestArray));
                echo $randomNumber . " bla bla bal <br><br>";

                //----------------------
                // Find a suitable next element that is not the same as the last selected element
                foreach ($codtestArray as $element) {
                    if (empty($randomTests) || $element !== end($randomTests)) {
                        $nextElement = $element;
                        break;
                    }
                }
    
                // If a suitable element is found, use it; otherwise, fallback to any element (avoiding only the last element)
                if ($nextElement === null) {
                    foreach ($codtestArray as $element) {
                        if (in_array($element, array_slice($randomTests, 0, -1))) {
                            continue;
                        }
                        $nextElement = $element;
                        break;
                    }
                }
    
    
                $randomTests[] = $nextElement;
            }
        }
        //echo "<br>----------<br>";
        //print_r($randomTests);
        //echo "<br>----------<br>";

    
        // Create a new array to store the randomized data
        $randomizedData = [];
    
        // Loop through the random codtest and extract the corresponding data
        foreach ($randomTests as $codtest) {
            $test = array_filter($data, function($item) use ($codtest) {
                // Use object property access if $item is an object
                return $item->codtest == $codtest;
            });
    
            // array_filter returns an array, we need to get the first element
            $test = reset($test);
    
            if ($test) {
                $randomizedData[] = $test;
            }
        }
    
        //print_r ($randomizedData);
        return($randomizedData);
    }

    private function randomizeAndMap($data) {
        // print_r($data);
        // Convert JSON string to array if needed
        if (is_string($data)) {
            $data = json_decode($data, true);
        }
    
        $result = [];
    
        foreach ($data as $item) {
            // Collect v1, v2, v3, v4 and raspuns into an array
            $vFields = [$item['v1'], $item['v2'], $item['v3'], $item['v4']];
            shuffle($vFields);
            //print_r($vFields);
            // Assign the first three elements as v1, v2, r
            $newItem = [];
            $newItem['codserie'] = $item['codserie'];
            $newItem['denumireserie'] = $item['denumireserie'];
            $newItem['codtest'] = $item['codtest'];
            $newItem['enunt'] = $item['enunt'];
            $newItem['calea']=$item['calea'];
            
            $vItem = [];
            // Randomly assign the first three elements from the shuffled array
            $vItem['v1'] = $vFields[0];
            $vItem['v2'] = $vFields[1];
            $vItem['v3'] = $item['raspuns'];
            shuffle($vItem);

            // integrate the v1, v2, v3 into the newItem array
            $newItem['v1'] = $vItem[0];
            $newItem['v2'] = $vItem[1];
            $newItem['v3'] = $vItem[2];
            // integrate the r into the newItem array
            $newItem['r'] = $item['raspuns'];
           
    
            $result[] = $newItem;
        }
    
        return $result;
    }
    
    
    
      
    


}

/**
SELECT t.codtest, s.denumireserie
FROM tests t
JOIN serii s ON t.codserie = s.codserie
WHERE t.codserie = 'your_codserie_value';

SELECT s.codserie, s.denumireserie
        FROM serii s
        JOIN tests t ON t.codserie = s.codserie
        WHERE t.codserie = "M10AL04"




        echo "<br>----------<br>";
        print_r($randomTests);
        echo "<br>----------<br>";


  // Helper function to randomly select an element from an array
      function array_random(array $array, $count = 1) {
        shuffle($array);
        return array_slice($array, 0, $count);
      }



       // If a suitable element is found, use it; otherwise, fallback to any element (avoiding only the last element)
                if ($nextElement === null) {
                    foreach ($codtestArray as $element) {
                        if ($element !== end($randomTests)) {
                            $nextElement = $element;
                            break;
                        }
                    }
                }

*/
?>


