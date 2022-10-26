<!--mulakan sesi login untuk meneruskan step seterusnya -->
<?PHP include('header.php'); ?>

<div class='w3-row w3-margin'>  

	    <div class=' w3-container w3-margin-bottom'>
        <?PHP include('iklan.php'); ?> 
    </div>
	 
	 <br>
	 <br>
    <div class=' w3-container w3-margin-bottom'>
        <div class='w3-container w3-card-2 w3-pale-red '>
            <h4 class='w3-tulisan-p2'>Booking</h4>
        </div>
        <div class='w3-container w3-card-2 w3-white '>           
            <form class='w3-form w3-margin-bottom' action='tempahan_senarai.php' method='POST'>
                <label class='w3-tulisan-p2'>Check-In Date</label>
                <input type='date' name='tarikh_masuk' class='w3-input w3-border w3-round-xxlarge w3-large' required value='<?PHP echo $tarikh_masuk;?>' min='<?PHP echo $tarikh_masuk;?>'>
                <label class='w3-tulisan-p2'>Check-Out Date</label>
                <input type='date' name='tarikh_keluar' class='w3-input w3-border w3-round-xxlarge w3-large' required value='<?PHP echo $tarikh_keluar;?>' min='<?PHP echo $tarikh_keluar;?>'>
                <h4> </h4>
                <button class="w3-button w3-block w3-light-gray w3-round-xxxlarge">Search</button>
            </form>
        </div>
    </div>
 

</div>

<br>

<?PHP include('iklan2.php'); ?>

<?PHP include('footer.php'); ?>