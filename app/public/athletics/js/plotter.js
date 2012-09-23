plotter = {
	renderer: 'area',
	interpolation: 'basis',

	/**
	 * Graph data
	 *
	 * @param seriesData
	 * @param containerId
	 */
	graphData: function(seriesData, exerciseKey) {
		var palette = new Rickshaw.Color.Palette({
			scheme: 'spectrum14',
			interpolatedStopCount: 1
		});

		var series = seriesData.map(function(s) {
			return {
				data: s,
				color: palette.color()
			}
		});

		var graph = new Rickshaw.Graph({
			element: document.querySelector("#chart_" + exerciseKey),
			width: 500,
			height: 250,
			renderer: this.getRenderer(),
			interpolation: this.getInterpolation(),
			stroke: true,
			series: series
		});

		var x_axis = new Rickshaw.Graph.Axis.Time({
			graph: graph,
			tickFormat: Rickshaw.Fixtures.Number.formatKMBT
		});

		var y_axis = new Rickshaw.Graph.Axis.Y({
			graph: graph,
			orientation: 'left',
			element: document.getElementById('y_axis_' + exerciseKey)
		});

		graph.render();

		var slider = new Rickshaw.Graph.RangeSlider({
			graph: graph,
			element: $('#slider_' + exerciseKey)
		});
	},

	/* Getters/Setters
	 */

	/**
	 * Set interpolation
	 */
	setInterpolation: function(interpolation) {
		this.interpolation = interpolation;
	},

	/**
	 * Get interpolation
	 */
	getInterpolation: function() {
		return this.interpolation;
	},

	/**
	 * Set renderer
	 */
	setRenderer: function(renderer) {
		this.renderer = renderer;
	},

	/**
	 * Get renderer
	 */
	getRenderer: function() {
		return this.renderer;
	}
}
