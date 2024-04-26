<?php
include "top.php";
?>
        <main>
            <h1 class="heading">The Environmental Benefits of Thrifting</h1>

            <section class="one">
                <h2>Thrifting to the Rescue</h2>
                <p>Plenty of college students end the semester with clothes & items they don't 
                    want, and that is okay. You can't undo what you've bought or received at the 
                    beginning of the year. But you <em>can</em> make sure these things don't get 
                    dumped in a landfill to slowly decompose over the next millenia. Thrifting 
                    promotes more ethical consumption, and reduces plenty of different types of 
                    pollution. Carbon footprints are lessened as production & transportation 
                    emissions are minimized by buying items secondhand. Through secondhand consumption, 
                    you extend the life of a product, conserving its resources. This is especially 
                    true when it comes to clothing. So before you toss that unused tumbler or free 
                    hoodie, consider the idea that someone else might use it!
                </p>

                <figure>
                    <img src="images/thrift.jpeg" alt="">
                    <figcaption><cite><a href="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.statepress.com%2Farticle%2F2021%2F03%2Fspecho-thrifting-secondhand-clothing-through-the-ages&psig=AOvVaw3Bw2Q019cGkU4ocmA_XIW4&ust=1701793019957000&source=images&cd=vfe&opi=89978449&ved=0CBQQjhxqFwoTCMDu_ZmX9oIDFQAAAAAdAAAAABAv"></a></cite></figcaption>
                </figure>
            </section>

            <section class="two">
                <h2>What Happens in Landfills?</h2>
                <table>
                    <caption><strong>Annual Waste Statistics</strong></caption>
                    <tr>
                        <th>Material</th>
                        <th>Amount Produced Annually</th>
                        <th>Decomposition Time</th>
                        <th>Carbon Emissions Annually</th>
                        <th>Consumer Spending Annually</th>
                    </tr>

                    <?php
                    $sql = 'SELECT fldMaterial, fldProduction, fldDecomposition, fldCarbon, fldCost FROM tblWaste';
                    $statement = $pdo->prepare($sql);
                    $statement->execute();

                    $records = $statement->fetchAll();

                    foreach($records as $record){
                        print '<tr>';
                        print '<td>' . $record['fldMaterial'] . '</td>';
                        print '<td>' . $record['fldProduction'] . '</td>';
                        print '<td>' . $record['fldDecomposition'] . '</td>';
                        print '<td>' . $record['fldCarbon'] . '</td>';
                        print '<td>' . $record['fldCost'] . '</td>';
                        print '</tr>' . PHP_EOL;
                    }
                    ?>
                </table>
            </section>

            <section class="three">
                <h2>The Link between Secondhand Consumption and Community</h2>
                <p>You may not think of a quick thrifting trip with your friends as being something 
                    that contributes to your community, but think again! Buying from local secondhand 
                    businesses can strengthen the local economy and foster a sense of communal collaboration. 
                    And if you buy from a non-profit like ours, your money goes towards local charities 
                    in order to support and sustain your community! If more people shop secondhand, not 
                    only will they play a part in saving the environment, but they'll also be taking a 
                    more active role in supporting their community!
                </p>
            </section>
        </main>
        <?php include 'footer.php'; ?>
    </body>
</html>