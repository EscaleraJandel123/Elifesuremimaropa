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
                            height: 250
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 4,
                                horizontal: false,
                            }
                        },
                        dataLabels: {
                            enabled: false
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
                            title: {
                                text: 'Number of Agents'
                            },
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
                                horizontal: true,
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
                            type: 'pie',
                            height: 250
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 4,
                                horizontal: false,
                            }
                        },
                        dataLabels: {
                            enabled: false
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
                            title: {
                                text: 'Number of Applicants'
                            },
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
                            data: commissions
                        }],
                        chart: {
                            type: 'bar',
                            height: 250
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 4,
                                horizontal: true,
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
                            text: 'Over all Yearly Commissions',
                            // align: 'center',
                        }
                    }).render();
                }
            });
    });
</script>