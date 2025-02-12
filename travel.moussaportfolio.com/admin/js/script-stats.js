 
 
 const pieChart = document.querySelector("#pieChart");
      const graph = new Chart(pieChart, {
        type: "pie",
        data: {
          labels: labelLine,
          datasets: [
            {
              data: dataLine,
              backgroundColor: [
                "orange",
                "yellow",
                "red",
                "blue",
                "green",
                "grey",
              ],
              hoverOffset: 10,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: true,
          aspectRatio: 1,
          plugins: {
            title: {
              text: "Employés par département",
              display: true,
              position: "top",
            },
            legend: {
              position: "bottom",
            },
          },
        },
      });