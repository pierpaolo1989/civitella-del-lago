(function () {
    "use strict";

    var mapElement = document.getElementById("tour-map");
    var statusElement = document.getElementById("map-status");

    if (mapElement && statusElement && typeof L === "undefined") {
        statusElement.textContent = "La mappa non si è caricata. Puoi comunque consultare le tappe nell'elenco.";
    }

    var header = document.querySelector(".site-header");
    var menuToggle = document.querySelector(".nav-toggle");
    var menuCloseButtons = document.querySelectorAll(".nav-close, .nav-backdrop");

    function setMenuOpen(isOpen) {
        if (!header || !menuToggle) {
            return;
        }

        header.classList.toggle("menu-open", isOpen);
        menuToggle.setAttribute("aria-expanded", String(isOpen));
        menuToggle.setAttribute("aria-label", isOpen ? "Chiudi il menu" : "Apri il menu");
        document.body.classList.toggle("menu-is-open", isOpen);
    }

    if (header && menuToggle) {
        menuToggle.addEventListener("click", function () {
            setMenuOpen(menuToggle.getAttribute("aria-expanded") !== "true");
        });

        menuCloseButtons.forEach(function (button) {
            button.addEventListener("click", function () {
                setMenuOpen(false);
            });
        });

        header.querySelectorAll(".site-nav a").forEach(function (link) {
            link.addEventListener("click", function () {
                setMenuOpen(false);
            });
        });

        document.addEventListener("keydown", function (event) {
            if (event.key === "Escape") {
                setMenuOpen(false);
            }
        });

        window.addEventListener("resize", function () {
            if (window.innerWidth > 991) {
                setMenuOpen(false);
            }
        });
    }

    if (!mapElement || !statusElement || typeof L === "undefined") {
        return;
    }

    var stops = [
        {
            id: "piazza",
            name: "Piazza Vittorio Emanuele",
            position: [42.711998, 12.281224],
            streetView: "https://www.google.com/maps/@?api=1&map_action=pano&viewpoint=42.711998,12.281224"
        },
        {
            id: "centrale",
            name: "Via Centrale",
            position: [42.711665, 12.280987],
            streetView: "https://www.google.com/maps/@?api=1&map_action=pano&viewpoint=42.711665,12.280987"
        },
        {
            id: "tortuosa",
            name: "Via Tortuosa",
            position: [42.712039, 12.280675],
            streetView: "https://www.google.com/maps/@?api=1&map_action=pano&viewpoint=42.712039,12.280675"
        },
        {
            id: "belvedere",
            name: "Piazza Belvedere",
            position: [42.711376, 12.280478],
            streetView: "https://www.google.com/maps/@?api=1&map_action=pano&viewpoint=42.711376,12.280478"
        }
    ];

    var map = L.map(mapElement, {
        scrollWheelZoom: false
    });
    var bounds = [];

    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    function selectStop(stop, openPopup) {
        var card = document.querySelector('[data-stop-id="' + stop.id + '"]');
        var marker = markers[stop.id];

        document.querySelectorAll(".stop-card.is-active").forEach(function (activeCard) {
            activeCard.classList.remove("is-active");
        });

        if (card) {
            card.classList.add("is-active");
        }

        map.flyTo(stop.position, 18, {
            duration: 0.6
        });

        if (openPopup && marker) {
            marker.openPopup();
        }
    }

    var markers = {};
    var positions = [];

    stops.forEach(function (stop, index) {
        var icon = L.divIcon({
            className: "",
            html: '<span class="stop-number-icon" aria-hidden="true">' + (index + 1) + "</span>",
            iconSize: [34, 34],
            iconAnchor: [17, 17]
        });
        var popup = document.createElement("div");
        var title = document.createElement("h3");
        var link = document.createElement("a");

        popup.className = "tour-popup";
        title.textContent = stop.name;
        link.href = stop.streetView;
        link.target = "_blank";
        link.rel = "noopener noreferrer";
        link.textContent = "Prova Street View";
        popup.appendChild(title);
        popup.appendChild(link);

        markers[stop.id] = L.marker(stop.position, {
            icon: icon,
            title: stop.name,
            alt: "Tappa " + (index + 1) + ": " + stop.name,
            keyboard: true
        }).addTo(map).bindPopup(popup);

        markers[stop.id].on("click", function () {
            selectStop(stop, false);
        });

        positions.push(stop.position);
        bounds.push(stop.position);
    });

    L.polyline(positions, {
        className: "route-line",
        color: "#2e5b45",
        weight: 3,
        opacity: 0.75
    }).addTo(map);

    map.fitBounds(bounds, {
        padding: [35, 35]
    });

    document.querySelectorAll("[data-focus-stop]").forEach(function (button) {
        button.addEventListener("click", function () {
            var stop = stops.find(function (candidate) {
                return candidate.id === button.dataset.focusStop;
            });

            if (stop) {
                selectStop(stop, true);
            }
        });
    });

    document.querySelectorAll(".stop-card").forEach(function (card) {
        card.addEventListener("click", function (event) {
            if (event.target.closest("a, button")) {
                return;
            }

            var stop = stops.find(function (candidate) {
                return candidate.id === card.dataset.stopId;
            });

            if (stop) {
                selectStop(stop, true);
            }
        });
    });

    map.on("tileerror", function () {
        statusElement.textContent = "La mappa di sfondo non è momentaneamente disponibile. Le tappe restano selezionabili.";
    });
}());
