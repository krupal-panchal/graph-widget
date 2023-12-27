import React, {useState, useEffect} from 'react';
import { LineChart, Line, XAxis, YAxis, CartesianGrid, Tooltip, Legend } from 'recharts';
import { __ } from '@wordpress/i18n';
import apiFetch from '@wordpress/api-fetch';
import { addQueryArgs } from '@wordpress/url';

const GraphUI = (props) => {

	const [graphData, setGraphData] = useState();

	useEffect( () => {
		getGraphDataByAPI();
	}, [props.duration] );

	const getGraphDataByAPI = () => {

		let option_name = 'graph_data';

		/**
		 * Method to get the data of N days.
		 */
		const getLastNDaysData = (dataArray, days) => {
			
			// Parse date strings into Date objects
			const parsedData = dataArray.map(item => ({
				Date: new Date(item.Date),
				Expense: item.Expense
			}));		  

			// Sort the array based on the Date in increasing order
			const sortedData = parsedData.sort((a, b) => a.Date - b.Date);
		  
			// Get the start date for the range (N days ago from today)
			const startDate = new Date();
			startDate.setDate(startDate.getDate() - days);
		  
			// Filter data for the last N days
			const lastNDaysData = sortedData.filter(item => item.Date >= startDate);
		  
			// Format dates to 'Y-m-d' and store in a new array
			const formattedData = lastNDaysData.map(item => ({
				Date: item.Date.toISOString().split('T')[0], // 'Y-m-d' format
				Expense: item.Expense
			}));
		  
			return formattedData;
		};

		// Fetch the data from API.
		const queryParams = { name: option_name };

		apiFetch( { path: addQueryArgs( '/get/options', queryParams ) } ).then( ( resp ) => {
			if( '7d' === props.duration ) {
				setGraphData(getLastNDaysData(resp, 7));
			} else if( '15d' === props.duration ) {
				setGraphData(getLastNDaysData(resp, 15));
			} else {
				setGraphData(getLastNDaysData(resp, 30));
			}
		} );
	}

	return (
		<LineChart
			width={400}
			height={300}
			data={graphData}
			margin={{
				top: 25,
				right: 40,
				left: 5,
				bottom: 5,
			}}
		>
			<CartesianGrid strokeDasharray="3 3" />
			<XAxis dataKey={__( 'Date', 'graph-widget' )} />
			<YAxis />
			<Tooltip />
			<Legend />
			<Line type="monotone" dataKey={__( 'Expense', 'graph-widget' )} stroke="#8884d8" activeDot={{ r: 8 }} />
		</LineChart>
	);
}

export default GraphUI;


