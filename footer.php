<!-- Start Footer -->
<div class="container-fluid bg-light text-center p-2 footer">
    <footer style=" color: black;">Copyright &copy; 2021 || Designed By <b>Ankit Agarwal</b> <br />
        For the Project of <b>The Sparks Foundation</b> </footer>

</div>
<!-- End Footer -->


<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.js"></script>

<!-- Custom Javascript -->
<script type="text/javascript" src="index.js"></script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>

<!-- Owl Carousel Js file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>

<!-- isotope plugin Js file -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#myTable').DataTable();

});
</script>

<script>
edits = document.getElementsByClassName('edit');
Array.from(edits).forEach((element) => {
    element.addEventListener("click", (e) => {
        // console.log("edit");
        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName("td")[0].innerText;
        description = tr.getElementsByTagName("td")[1].innerText;
        // console.log(title, description);
        titleEdit.value = title;
        descriptionEdit.value = description;
        snoEdit.value = e.target.id;
        // console.log(e.target.id);
        $('#editModal').modal('toggle');

    })
})

deletes = document.getElementsByClassName('delete');
Array.from(deletes).forEach((element) => {
    element.addEventListener("click", (e) => {
        // console.log("delete");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this note!")) {
            console.log("yes");
            window.location = `/crud/Crud.php?delete=${sno}`;
            // TODO: Create a form and use post request to submit a form
        } else {
            console.log("no");
        }

    })
})
</script>


</body>



</html>