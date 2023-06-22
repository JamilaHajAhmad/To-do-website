<?php

include "../utils/start_initialization.php";

include "../constants/ItemTypes.php";

$completedItems = $_SESSION["items"]["completed"];

?>

    <div class="bg-gray-100 space-y-12 py-10 rounded-2xl">
        <div>
            <h3 class="text-3xl text-center font-source-code-pro">
                Completed items
            </h3>
            <!-- ::if statement start here to show this message once;; -->
            <?php if(key_exists("message",$_SESSION)){ ?>
            <div class="bg-green-500 my-8 py-4 font-source-code-pro text-lg text-white text-center">
                <!-- {$redirect_message} -->
                <?php echo $_SESSION["message"];
                unset($_SESSION["message"]);
                ?>
            </div>
            <!-- ::if statement end here to show this message once;; -->
            <?php } ?>
        </div>
        <!-- completed item element -->
        <div class="container mx-auto">

            <!-- ::loop of items.completed should start here;; -->
            <?php $index = 1; ?>
            <?php foreach ($completedItems as $id=>$completedItem){ ?>
            <div class="bg-white my-4 max-w-sm mx-auto rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
                <div class="h-20 bg-green-500 flex items-center justify-start gap-3">
                    <h1 class="text-white ml-4 border-2 py-2 px-4 rounded-full">
                        <!-- {$index}  -->
                        <?php echo $index++; ?>
                    </h1>
                    <p class="mr-20 text-white text-lg">
                        <!-- {$title} -->
                        <?php echo $completedItem["title"]; ?>
                    </p>
                </div>

                <div class="flex items-center px-4 gap-3">
                    <form method="post" action="../actions/assign_completed_item_as_uncompleted_action.php" id="completed-item-<?php echo $id; ?>" class='my-0'>
                        <input hidden name="item_id" value="<?php echo $id; ?>">
                        <input type="checkbox" onclick="document.getElementById('completed-item-<?php echo $id; ?>').submit()"
                               checked class='h-6 w-6 bg-white checked:scale-75 transition-all duration-200 peer'
                        />
                    </form>
                    <p class="py-6 text-lg tracking-wide gap-2 text-green-800">
                        <!-- {$description} -->
                        <?php echo "[COMPLETED]"," ", $completedItem["description"]; ?>
                    </p>
                </div>

                <form action="../actions/assign_item_as_deleted_action.php" method="post">
                    <input hidden name="item_id" value="<?php echo $id; ?>">
                    <input hidden name="delete_from" value="<?php echo ItemTypes::COMPLETED; ?>" />
                    <button type="submit"
                            class="text-sm bg-red-500 text-white px-3 py-2 mx-4 rounded hover:bg-white hover:text-red-500 duration-500">
                        Delete
                    </button>
                </form>

                <div class="flex justify-between px-5 my-4 text-sm text-gray-600">
                    <p>Completed at</p>
                    <p>
                        <!-- {$completed_at} -->
                        <?php echo $completedItem["completed_at"]; ?>
                    </p>
                </div>
            </div>
            <!-- ::loop of items.completed should end here;; -->
            <?php } ?>
        </div>
    </div>

<?php

include "../utils/end_initialization.php";