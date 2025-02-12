

        const lineChart = document.querySelector("#lineChart");
        const graph1 = new Chart(lineChart, {
            // The type of chart we want to create
            type: "line",
            data: {
                labels: labelLine,
                datasets: [
                    {
                        data: dataLine,
                        backgroundColor: ["red"],
                        borderColor: ["darkslateblue"],
                        label: "Visites par jour",
                        fill: true,
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                aspectRatio: 1,
                plugins: {
                    title: {
                        text: "Visites selon les jours",
                        display: true,
                        position: "top",
                    },
                    legend: {
                        position: "bottom",
                    },
                },
            },
        });


        const lineChart2 = document.querySelector("#lineChart2");
        const graph2 = new Chart(lineChart2, {
            // The type of chart we want to create
            type: "line",
            data: {
                labels: labelLine2,
                datasets: [
                    {
                        data: dataLine2,
                        backgroundColor: ["red"],
                        borderColor: ["darkslateblue"],
                        label: "Visites par langue",
                        fill: true,
                    },
                    
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                aspectRatio: 1,
                plugins: {
                    title: {
                        text: "Visites selon les langues",
                        display: true,
                        position: "top",
                    },
                    legend: {
                        position: "bottom",
                    },
                },
            },
        });
   