<?php
class functiontest extends PHPUnit_Framework_TestCase
{
    //Check the correct graphic is showing and functional

    public function testAssertweathergraph()
    {
        // Arrange
        $W = 1;

        // Act
        $result =  Weathergraph($W);


        // Assert
        $this->assertEquals  ('images/sunny_day.png', $result);
    }

    //Check the correct weather type is returned and functional

    public function testAssertweathertype()
    {
        // Arrange
        $W = 8;

        // Act
        $result =  Weathertype($W);


        // Assert
        $this->assertEquals  ('<td class="warning">Overcast</td>', $result);
    }

 //Check the correct visibility type is returned and functional

    public function testAssertvisibility()
    {
        // Arrange
        $V = "PO";

        // Act
        $result =  Visibility($V);


        // Assert
        $this->assertEquals  ('<td class="warning" data-toggle="tooltip" data-placement="right" title="1-4km">Poor</td>', $result);
    }


 //Check the correct visibility graphic is shown and functional

    public function testAssertvisgraph()
    {
        // Arrange
        $V = "EX";

        // Act
        $result =  Visgraph($V);


        // Assert
        $this->assertEquals  ('images/sunny_day.png', $result);
    }

 //Check the correct Temperature type is shown and functional

    public function testAssertTempgraph()
    {
        // Arrange
        $T = 21;

        // Act
        $result =  Tempgraph($T);


        // Assert
        $this->assertEquals  ('images/3.png', $result);
    }

//Check the correct wind direction is shown

    public function testAssertwindgraph()
    {
        // Arrange
        $D = "NNE";

        // Act
        $result =  Windgraph($D);


        // Assert
        $this->assertEquals  ('images/wind_north_east.png', $result);
    }



}
