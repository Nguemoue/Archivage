 $(function(){
    let options = {
        series: [
            {
                name: "Selling Product",
                data: [28, 120, 36, 90, 38, 85,],
            },
            {
                name: "Followers",
                data: [50, 100, 65, 140, 32, 60],
            },
            {
                name: "Campaign",
                data: [100, 50, 130, 70, 135, 80],
            },
        ],
        chart: {
            toolbar: {
                show: false,
            },
            type: "line",
            fontFamily: "Plus Jakarta Sans', sans-serif",
            foreColor: "#adb0bb",
            height: 200,
        },
        colors: ["#fa896b", "#615dff", "#3dd9eb"],
        dataLabels: {
            enabled: false,
        },
        legend: {
            show: false,
        },
        stroke: {
            curve: "smooth",
            width: 3,
        },
        grid: {
            borderColor: "rgba(0,0,0,0.1)",
            strokeDashArray: 3,
            xaxis: {
                lines: {
                    show: false,
                },
            },
            padding: {
                top: 0,
                right: 0,
                bottom: 0,
                left: 0,
            },
        },
        xaxis: {
            categories: [
                "1-10 Aug",
                "11-20 Aug",
                "21-30 Aug",
                "1-10 Sept",
                "11-20 Sept",
                "21-30 Sept",
            ],
        },
        yaxis: {
            tickAmount: 4,
        },
        tooltip: {
            theme: "dark",
        },
    };

    let chart = new ApexCharts(document.querySelector("#financial"), options);
    chart.render();
});
