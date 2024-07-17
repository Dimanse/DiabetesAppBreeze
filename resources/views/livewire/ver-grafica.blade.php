<div class=" bg-white overflow-hidden shadow-lg rounded-lg border border-gray-200 my-10 mx-5">
    <h2 class="text-center text-2xl uppercase font-bold mt-5 text-gray-700">Gráfica de glucémias</h2>
    <canvas id="myChart" class="h-14 "></canvas>
</div>

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script type="text/javascript">

          const max = [140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, ];

          const min = [90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, ];

          var labels =  {{ Js::from($data)  }};
          var users =  {{ Js::from($labels)}};

          var fecha = {{ Js::from($labels)}};




        //    const data = {
        //     labels: labels,
        //     datasets: [{
        //       label: 'My First dataset',
        //       backgroundColor: 'rgb(99 102 241);',
        //       borderColor: 'rgb(99 102 241)',
        //       data: users,
        //     }]
        //   };

        //   const data1 = {
        //     labels: 140,
        //     datasets: [{
        //       label: 'Limit',
        //       backgroundColor: 'rgb(220 38 38)',
        //       borderColor: 'rgb(220 38 38)',
        //       data: fecha,
        //     }]
        //   };

        //   const config = {
        //     type: 'line',
        //     data: [ data, data1]
        //     options: {}
        //   };



        //   const myChart = new Chart(
        //     document.getElementById('myChart'),
            // config
        //   );
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type:'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'glucemias',
                        data: users,
                        backgroundColor: 'rgba(99, 102, 241, 0.2)',
                        borderColor: 'rgb(99 102 241)',
                        fill: true,
                 }, {


                        label: 'Limite max',
                        data: max,
                        backgroundColor: 'rgba(34, 197, 94, 0.2)',
                        borderColor: 'rgb(34 197 94)',
                        fill: true,
                }, {


                        label: 'Limite min',
                        data: min,
                        backgroundColor: 'transparent',
                        borderColor: 'rgb(34 197 94)',
                        fill: false,
                    }
            ],
            }
            })

    </script>

    @endpush
