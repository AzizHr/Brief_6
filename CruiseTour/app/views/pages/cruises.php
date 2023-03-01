<?php require APPROOT . '/views/inc/navbar.php';  ?>
<style>
    .hidden {
        display: none;
    }
</style>
<div class="container-fluid main_image">
    <h1 class="main_title">ShipCruise</h1>
    <p class="main-description">Browse Available Cruises Now</p>
</div>
<div class="row justify-content-center gap-3 mt-5 mx-5">
    <form class="col-md-3" action="<?= URLROOT . 'cruises/filterByPort' ?>" method="post">
        <div class="d-flex gap-2">
            <select class="form-select" name="port_id">
                <?php foreach ($data['ports'] as $port) : ?>
                    <option value="<?= $port->port_id ?>"><?= $port->port_name ?></option>
                <?php endforeach ?>
            </select>

            <input class="btn btn-warning" type="submit" value="Filter">
        </div>
    </form>

    <form class="col-md-3" action="<?= URLROOT . 'cruises/filterByShip' ?>" method="post">
        <div class="d-flex gap-2">
            <select class="form-select" name="ship_id">
                <?php foreach ($data['ships'] as $ship) : ?>
                    <option value="<?= $ship->ship_id ?>"><?= $ship->ship_name ?></option>
                <?php endforeach ?>
            </select>

            <input class="btn btn-warning" type="submit" value="Filter">
        </div>
    </form>

    <form class="col-md-3" action="<?= URLROOT . 'cruises/filterByDate' ?>" method="post">
        <div class="d-flex gap-2">
            <select class="form-select" name="cruise_id">
                <?php foreach ($data['dates_ids'] as $dates_id) : ?>
                    <option value="<?= $dates_id->cruise_id ?>"><?= $dates_id->starts_at ?></option>
                <?php endforeach ?>
            </select>

            <input class="btn btn-warning" type="submit" value="Filter">
        </div>
    </form>

</div>
<ul id="paginated-list" class="row gap-5" style="justify-content: center; margin-top: 60px; width: 100%;">
    <?php if (count($data['cruises']) > 0) : ?>
        <?php foreach ($data['cruises'] as $cruise) : ?>
            <li class="card col-lg-3 col-md-6" style="width: 18rem; padding: 0; height: 490px;">
                <img src="<?= URLROOT . './img/img1.jpg' ?>" class="card-img-top" style="width: 100%;" alt="...">
                <div class="card-body">
                    <h5 class="card-title" style="margin-top: -30px; font-weight: bold;"><?= $cruise->title ?></h5>
                    <p class="card-text" style="margin-top: -20px;"><?= $cruise->starting_port_name . ' , ' . $cruise->itinerary ?></p>
                    <p class="card-text" style="margin-top: -24px;"><small><?= $cruise->starts_at ?></small></p>
                    <a style="margin-top: -20px;" href="<?= URLROOT . 'cruises/show_to_reserve/' . $cruise->cruise_id ?>" class="btn btn-primary">Book Now</a>
                </div>
            </li>
        <?php endforeach ?>
    <?php endif ?>

    <?php if (count($data['cruises']) == 0) : ?>
        <h1>No Cruises Found</h1>
    <?php endif ?>
</ul>

<div class="d-flex justify-content-center mt-5">
<nav class="btn-group pagination-container" role="group" aria-label="Basic outlined example">
    <button type="button" class="btn btn-outline-primary pagination-button" id="prev-button" title="Previous page" aria-label="Previous page"><<</button>
    <div id="pagination-numbers">
    </div>
    <button type="button" class="btn btn-outline-primary pagination-button" id="next-button" title="Next page" aria-label="Next page">>></button>
</nav>
</div>
<script>
    const paginationNumbers = document.getElementById("pagination-numbers");
    const paginatedList = document.getElementById("paginated-list");
    const listItems = paginatedList.querySelectorAll("li");
    const nextButton = document.getElementById("next-button");
    const prevButton = document.getElementById("prev-button");

    const paginationLimit = 3;
    const pageCount = Math.ceil(listItems.length / paginationLimit);
    let currentPage = 1;

    const disableButton = (button) => {
        button.classList.add("disabled");
        button.setAttribute("disabled", true);
    };

    const enableButton = (button) => {
        button.classList.remove("disabled");
        button.removeAttribute("disabled");
    };

    const handlePageButtonsStatus = () => {
        if (currentPage === 1) {
            disableButton(prevButton);
        } else {
            enableButton(prevButton);
        }

        if (pageCount === currentPage) {
            disableButton(nextButton);
        } else {
            enableButton(nextButton);
        }
    };

    const handleActivePageNumber = () => {
        document.querySelectorAll(".pagination-number").forEach((button) => {
            button.classList.remove("bg-orange-100", "text-orange-700", "font-medium");
            const pageIndex = Number(button.getAttribute("page-index"));
            if (pageIndex == currentPage) {
                button.classList.add("bg-orange-100", "text-orange-700", "font-medium");
            }
        });
    };

    const appendPageNumber = (index) => {
        const pageNumber = document.createElement("button");
        pageNumber.className = "pagination-number btn btn-outline-primary";
        pageNumber.innerHTML = index;
        pageNumber.setAttribute("page-index", index);
        pageNumber.setAttribute("aria-label", "Page " + index);

        paginationNumbers.appendChild(pageNumber);
    };

    const getPaginationNumbers = () => {
        for (let i = 1; i <= pageCount; i++) {
            appendPageNumber(i);
        }
    };

    const setCurrentPage = (pageNum) => {
        currentPage = pageNum;

        handleActivePageNumber();
        handlePageButtonsStatus();

        const prevRange = (pageNum - 1) * paginationLimit;
        const currRange = pageNum * paginationLimit;

        listItems.forEach((item, index) => {
            item.classList.add("hidden");
            if (index >= prevRange && index < currRange) {
                item.classList.remove("hidden");
            }
        });
    };

    window.addEventListener("load", () => {
        getPaginationNumbers();
        setCurrentPage(1);

        prevButton.addEventListener("click", () => {
            setCurrentPage(currentPage - 1);
        });

        nextButton.addEventListener("click", () => {
            setCurrentPage(currentPage + 1);
        });

        document.querySelectorAll(".pagination-number").forEach((button) => {
            const pageIndex = Number(button.getAttribute("page-index"));

            if (pageIndex) {
                button.addEventListener("click", () => {
                    setCurrentPage(pageIndex);
                });
            }
        });
    });
</script>
<?php require APPROOT . '/views/inc/footer_component.php'; ?>