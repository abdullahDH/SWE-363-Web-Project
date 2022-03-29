<?php
require_once 'include/header.php';
?>


    <div class="space"></div>
    <div class="margi">
        <h3>Add a meal</h3>

        <form action="add.php" method="post" enctype="multipart/form-data">
            <div>
                <label class="PageText">Name <br>
                    <input class="TextInput" type="text" placeholder="Meal name"
                           name="title">
                </label>
            </div>
            <label class="PageText">Image</label>
            <input type="file" id="img" accept="image/*" name="image">

            <div>
                <label class="PageText">Price<br>
                    <input class="TextInput" type="text" placeholder="Meal Price"
                           name="price">
                </label>
            </div>
            <div>
                <label class="PageText">description </label>
                <div id="err">Please type your review</div>
            </div>
            <div>
                                <textarea id="Review" class="TextInput" name="description"
                                          placeholder="Type your description here, max 500 characters" maxlength="500"
                                          required>

                                </textarea>
            </div>
            <div id="result">0/500</div>


            <button onclick="valida()" style="cursor: pointer;" type="submit" class="button button3">
                Submit
            </button>

        </form>


    </div>

<?php
require_once 'include/footer.php';
?>