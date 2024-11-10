<script>
    document.addEventListener("DOMContentLoaded", () => {
        fetch('/monthlyAgentCount')
            .then(response => response.json())
            .then(data => {
                if (data.length === 0) {
                    document.querySelector("#agentChart").innerHTML = '<div style="text-align: center; padding: 20px;">No Data Available</div>';
                } else {
                    const monthsYears = data.map(item => `${getMonthName(item.month)} ${item.year}`);
                    const agentCounts = data.map(item => item.agent_count);

                    new ApexCharts(document.querySelector("#agentChart"), {
                        series: [{
                            name: 'Number of Agents',
                            data: agentCounts,
                            colors: ['#002379'] // Specify custom color here
                        }],
                        chart: {
                            type: 'bar',
                            // height: 250
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 4,
                                horizontal: false,
                            }
                        },
                        dataLabels: {
                            enabled: true
                        },
                        xaxis: {
                            categories: monthsYears,
                            labels: {
                                rotate: -45,
                                offsetY: 5,
                                style: {
                                    fontSize: '12px'
                                }
                            }
                        },
                        grid: {
                            show: false // Hide grid lines
                        },
                        title: {
                            text: 'Number of Agents'
                        },
                        yaxis: {
                            labels: {
                                formatter: function (value) {
                                    return Math.floor(value); // Remove decimals
                                }
                            }
                        },
                    }).render();
                }
            });
    });

    function getMonthName(monthNumber) {
        const months = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
        return months[monthNumber - 1];
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        fetch('/getApplicantsCount')
            .then(response => response.json())
            .then(data => {
                if (data.length === 0) {
                    document.querySelector("#ApplicantChart").innerHTML = '<div style="text-align: center; padding: 20px;">No Data Available</div>';
                } else {
                    const monthsYears = data.map(item => `${getMonthName(item.month)} ${item.year}`);
                    const applicantCounts = data.map(item => item.applicant_count);

                    new ApexCharts(document.querySelector("#ApplicantChart"), {
                        series: [{
                            name: 'Number of Applicants',
                            data: applicantCounts
                        }],
                        chart: {
                            type: 'bar',
                            // height: 250
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 4,
                                horizontal: false,
                            }
                        },
                        dataLabels: {
                            enabled: true
                        },
                        xaxis: {
                            categories: monthsYears,
                            labels: {
                                rotate: -45,
                                offsetY: 5,
                                style: {
                                    fontSize: '12px'
                                }
                            }
                        },
                        grid: {
                            show: false // Hide grid lines
                        },
                        yaxis: {
                            labels: {
                                formatter: function (value) {
                                    return Math.floor(value); // Remove decimals
                                }
                            }
                        },
                        title: {
                            text: 'Number of Applicants'
                        },
                    }).render();
                }
            });
    });

    function getMonthName(monthNumber) {
        const months = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
        return months[monthNumber - 1];
    }
</script>


<!-- Agent monthly commision -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        fetch('/getMonthlyCommissions')
            .then(response => response.json())
            .then(data => {
                if (data.length === 0) {
                    document.querySelector("#barChart").innerHTML = '<div style="text-align: center; padding: 20px;">No Commissions yet</div>';
                } else {
                    const months = data.map(item => getMonthName(item.month));
                    const commissions = data.map(item => item.total_commission);

                    new ApexCharts(document.querySelector("#barChart"), {
                        series: [{
                            data: commissions
                        }],
                        chart: {
                            type: 'bar',
                            height: 250
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 4,
                                horizontal: false,
                            }
                        },
                        grid: {
                            show: false // Hide grid lines
                        },
                        dataLabels: {
                            enabled: true
                        },
                        xaxis: {
                            categories: months
                        },
                        title: {
                            text: 'Monthly Commissions',
                            // align: 'center',
                        }
                    }).render();
                }
            });
    });

    function getMonthName(monthNumber) {
        const months = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
        return months[monthNumber - 1];
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Fetch the sub-agent count data
        fetch('/getSubAgentsCount')
            .then(response => response.json())
            .then(subAgentData => {
                if (subAgentData.length === 0) {
                    // If no data, display a message instead of the chart
                    document.querySelector("#subAgentChart").innerHTML = "<p class='text-center'>No sub-agents data available yet.</p>";
                } else {
                    const monthsYears = subAgentData.map(item => `${getMonthName(item.month)} ${item.year}`);
                    const subAgentCounts = subAgentData.map(item => item.agent_count);

                    // Render the chart using ApexCharts
                    new ApexCharts(document.querySelector("#subAgentChart"), {
                        series: [{
                            name: 'Sub-Agent Count',
                            data: subAgentCounts,
                        }],
                        chart: {
                            type: 'bar',  // 'bar' chart for sub-agent counts
                            height: 250
                        },
                        xaxis: {
                            categories: monthsYears,
                            labels: {
                                rotate: -45,
                                style: {
                                    fontSize: '12px',
                                    colors: '#333'
                                }
                            }
                        },
                        title: {
                            text: 'Monthly Sub-Agent Count'
                        },
                        grid: {
                            borderColor: '#f1f1f1'
                        },
                        tooltip: {
                            y: {
                                formatter: function (value) {
                                    return value + " sub-agents";
                                }
                            }
                        }
                    }).render();
                }
            });

        // Helper function to get month name from month number
        function getMonthName(month) {
            const date = new Date();
            date.setMonth(month - 1); // JavaScript months are 0-based
            return date.toLocaleString('default', { month: 'short' });
        }
    });
</script>

<!-- Agent yearly commision -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        fetch('/getYearlyCommissions')
            .then(response => response.json())
            .then(data => {
                if (data.length === 0) {
                    document.querySelector("#yearlyComm").innerHTML = '<div style="text-align: center; padding: 20px;">No Commissions yet</div>';
                } else {
                    const years = data.map(item => item.year);
                    const commissions = data.map(item => item.total_commission);

                    new ApexCharts(document.querySelector("#yearlyComm"), {
                        series: [{
                            data: commissions
                        }],
                        chart: {
                            type: 'bar',
                            height: 250
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 4,
                                // horizontal: true,
                                horizontal: false,
                            }
                        },
                        dataLabels: {
                            enabled: true
                        },
                        grid: {
                            show: false // Hide grid lines
                        },
                        xaxis: {
                            categories: years
                        },
                        title: {
                            text: 'Yearly Commissions',
                            // align: 'center',
                        }
                    }).render();
                }
            });
    });
</script>




<script>
    document.addEventListener("DOMContentLoaded", () => {
        fetch('/getoverallMonthlyCommissions')
            .then(response => response.json())
            .then(data => {
                if (data.length === 0) {
                    document.querySelector("#ovmonthlycommi").innerHTML = '<div style="text-align: center; padding: 20px;">No Commissions yet</div>';
                } else {
                    const months = data.map(item => getMonthName(item.month));
                    const commissions = data.map(item => item.total_commission);

                    new ApexCharts(document.querySelector("#ovmonthlycommi"), {
                        series: [{
                            name: 'Monthly Commissions',
                            data: commissions
                        }],
                        chart: {
                            type: 'bar',
                            // height: 250
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 4,
                                horizontal: false,
                            }
                        },
                        grid: {
                            show: false // Hide grid lines
                        },
                        dataLabels: {
                            enabled: true
                        },
                        xaxis: {
                            categories: months
                        },
                        tooltip: {
                            y: {
                                formatter: function (value) {
                                    return "₱" + value.toLocaleString();
                                }
                            }
                        },
                        title: {
                            text: 'Over all Monthly Commissions',
                            // align: 'center',
                        }
                    }).render();
                }
            });
    });

    function getMonthName(monthNumber) {
        const months = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
        return months[monthNumber - 1];
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        fetch('/getoverallYearlyCommissions')
            .then(response => response.json())
            .then(data => {
                if (data.length === 0) {
                    document.querySelector("#ovyearlyComm").innerHTML = '<div style="text-align: center; padding: 20px;">No Commissions yet</div>';
                } else {
                    const years = data.map(item => item.year);
                    const commissions = data.map(item => item.total_commission);

                    new ApexCharts(document.querySelector("#ovyearlyComm"), {
                        series: [{
                            name: 'Yearly Commissions',
                            data: commissions
                        }],
                        chart: {
                            type: 'bar',
                            // height: 250
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 4,
                                // horizontal: true,
                                horizontal: false,
                            }
                        },
                        dataLabels: {
                            enabled: true
                        },
                        grid: {
                            show: false // Hide grid lines
                        },
                        xaxis: {
                            categories: years
                        },
                        tooltip: {
                            y: {
                                formatter: function (value) {
                                    return "₱" + value.toLocaleString();
                                }
                            }
                        },
                        title: {
                            text: 'Over all Yearly Commissions',
                            // align: 'center',
                        }
                    }).render();
                }
            });
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", () => {
        // Fetch and render agent count predictions
        fetch('/predictMonthlyAgents')
            .then(response => response.json())
            .then(predictedAgentData => {
                const agentMonthsYears = predictedAgentData.map(item => `${getMonthName(item.month)} ${item.year}`);
                const agentPredictions = predictedAgentData.map(item => item.agent_count);

                new ApexCharts(document.querySelector("#agentPredictionChart"), {
                    series: [{
                        name: 'Predicted Agents',
                        data: agentPredictions,
                        colors: ['#00b3e6']
                    }],
                    chart: {
                        type: 'line',
                        height: 250
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 4,
                            // horizontal: true,
                            horizontal: false,
                        }
                    },
                    dataLabels: {
                        enabled: true
                    },
                    grid: {
                        show: false // Hide grid lines
                    },
                    xaxis: {
                        categories: agentMonthsYears,
                        labels: { rotate: -45, style: { fontSize: '12px' } }
                    },
                    title: {
                        text: 'Predicted Agent Counts'
                    }
                }).render();
            });

        // Fetch and render applicant count predictions
        fetch('/predictMonthlyApplicants')
            .then(response => response.json())
            .then(predictedApplicantData => {
                const applicantMonthsYears = predictedApplicantData.map(item => `${getMonthName(item.month)} ${item.year}`);
                const applicantPredictions = predictedApplicantData.map(item => item.applicant_count);

                new ApexCharts(document.querySelector("#applicantPredictionChart"), {
                    series: [{
                        name: 'Predicted Applicants',
                        data: applicantPredictions,
                        colors: ['#ff7b00']
                    }],
                    chart: {
                        type: 'line',
                        height: 250
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 4,
                            // horizontal: true,
                            horizontal: false,
                        }
                    },
                    dataLabels: {
                        enabled: true
                    },
                    grid: {
                        show: false // Hide grid lines
                    },
                    xaxis: {
                        categories: applicantMonthsYears,
                        labels: { rotate: -45, style: { fontSize: '12px' } }
                    },
                    title: {
                        text: 'Predicted Applicant Counts'
                    }
                }).render();
            });

        // Fetch and render monthly commission predictions
        fetch('/predictMonthlyCommissions')
            .then(response => response.json())
            .then(predictedCommissionData => {
                const commissionMonthsYears = predictedCommissionData.map(item => `${getMonthName(item.month)} ${item.year}`);
                const commissionPredictions = predictedCommissionData.map(item => item.total_commission);

                new ApexCharts(document.querySelector("#commissionPredictionChart"), {
                    series: [{
                        name: 'Predicted Commissions',
                        data: commissionPredictions,
                        colors: ['#28a745']
                    }],
                    chart: {
                        type: 'line',
                        height: 250
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 4,
                            // horizontal: true,
                            horizontal: false,
                        }
                    },
                    grid: {
                        show: false // Hide grid lines
                    },
                    dataLabels: {
                        enabled: true
                    },
                    xaxis: {
                        categories: commissionMonthsYears,
                        labels: { rotate: -45, style: { fontSize: '12px' } }
                    },
                    tooltip: {
                        y: {
                            formatter: function (value) {
                                return "₱" + value.toLocaleString();
                            }
                        }
                    },
                    title: {
                        text: 'Predicted Commissions'
                    }
                }).render();
            });
    });

    // Helper function to convert month number to month name
    function getMonthName(monthNumber) {
        const months = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
        return months[monthNumber - 1];
    }

</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Fetch the predicted commissions data for the next 12 months
        fetch('/predictAgentMonthlyCommissions')
            .then(response => response.json())
            .then(predictedCommissionData => {
                if (predictedCommissionData.length === 0) {
                    // Display a message if no data is available
                    document.querySelector("#commissionPredictionChart").innerHTML = '<div style="text-align: center; padding: 20px;">No Data Available</div>';
                    return;
                }

                const commissionMonthsYears = predictedCommissionData.map(item => `${getMonthName(item.month)} ${item.year}`);
                const commissionPredictions = predictedCommissionData.map(item => item.total_commission);

                // Render the chart using ApexCharts
                new ApexCharts(document.querySelector("#commissionPredictionChart"), {
                    series: [{
                        name: 'Predicted Commissions',
                        data: commissionPredictions,
                    }],
                    chart: {
                        type: 'line',
                        height: 250
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 4,
                            horizontal: false,
                        }
                    },
                    xaxis: {
                        categories: commissionMonthsYears,
                        labels: {
                            rotate: -45,
                            style: {
                                fontSize: '12px',
                                colors: '#333'
                            }
                        }
                    },
                    title: {
                        text: 'Predicted Commissions'
                    },
                    tooltip: {
                        y: {
                            formatter: function (value) {
                                return "₱" + value.toLocaleString();
                            }
                        }
                    }
                }).render();
            })
        // Helper function to get month name from month number
        function getMonthName(month) {
            const date = new Date();
            date.setMonth(month - 1); // JavaScript months are 0-based
            return date.toLocaleString('default', { month: 'short' });
        }
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Fetch and display monthly sales data
        fetch('/getoverallMonthlysales')
            .then(response => response.json())
            .then(monthlyData => {
                const monthsYears = monthlyData.map(item => `${getMonthName(item.month)} ${item.year}`);
                const monthlySales = monthlyData.map(item => item.total_commission);

                new ApexCharts(document.querySelector("#monthlySalesChart"), {
                    series: [{
                        name: 'Monthly Sales',
                        data: monthlySales,
                    }],
                    chart: {
                        type: 'bar',
                        height: 250
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 4,
                            horizontal: false,
                        }
                    },
                    grid: {
                        show: false // Hide grid lines
                    },
                    xaxis: {
                        categories: monthsYears,
                        labels: {
                            rotate: -45,
                            style: {
                                fontSize: '12px',
                                colors: '#333'
                            }
                        }
                    },
                    title: {
                        text: 'Overall Monthly Production'
                    },
                    tooltip: {
                        y: {
                            formatter: function (value) {
                                return "₱" + value.toLocaleString();
                            }
                        }
                    }
                }).render();
            });

        // Fetch and display yearly sales data
        fetch('/getoverallYearlysales')
            .then(response => response.json())
            .then(yearlyData => {
                const years = yearlyData.map(item => item.year);
                const yearlySales = yearlyData.map(item => item.total_commission);

                new ApexCharts(document.querySelector("#yearlySalesChart"), {
                    series: [{
                        name: 'Yearly Sales',
                        data: yearlySales,
                    }],
                    chart: {
                        type: 'bar',
                        height: 250
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 4,
                            horizontal: false,
                        }
                    },
                    grid: {
                        show: false // Hide grid lines
                    },
                    xaxis: {
                        categories: years,
                        labels: {
                            style: {
                                fontSize: '12px',
                                colors: '#333'
                            }
                        }
                    },
                    title: {
                        text: 'Overall Yearly Production'
                    },
                    tooltip: {
                        y: {
                            formatter: function (value) {
                                return "₱" + value.toLocaleString();
                            }
                        }
                    }
                }).render();
            });

        // Helper function to get month name from month number
        function getMonthName(month) {
            const date = new Date();
            date.setMonth(month - 1);
            return date.toLocaleString('default', { month: 'short' });
        }
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Fetch and display predicted monthly sales data
        fetch('/predictNext12MonthsSales')
            .then(response => response.json())
            .then(predictedSalesData => {
                const monthsYears = predictedSalesData.map(item => `${getMonthName(item.month)} ${item.year}`);
                const predictedSales = predictedSalesData.map(item => item.predicted_commission);

                new ApexCharts(document.querySelector("#salesPredictionChart"), {
                    series: [{
                        name: 'Predicted Production',
                        data: predictedSales,
                    }],
                    chart: {
                        type: 'line',
                        height: 250
                    },
                    xaxis: {
                        categories: monthsYears,
                        labels: {
                            rotate: -45,
                            style: {
                                fontSize: '12px',
                                colors: '#333'
                            }
                        }
                    },
                    title: {
                        text: 'Predicted Production'
                    },
                    tooltip: {
                        y: {
                            formatter: function (value) {
                                return "₱" + value.toLocaleString();
                            }
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        formatter: function (value) {
                            return "₱" + value.toLocaleString(); // Display formatted value
                        },
                        
                    }
                }).render();
            });

        // Helper function to get month name from month number
        function getMonthName(month) {
            const date = new Date();
            date.setMonth(month - 1);
            return date.toLocaleString('default', { month: 'short' });
        }
    });
</script>