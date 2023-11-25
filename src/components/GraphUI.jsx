import React, {useState, useEffect} from 'react';
import { LineChart, Line, XAxis, YAxis, CartesianGrid, Tooltip, Legend } from 'recharts';

const GraphUI = (props) => {

	const [graphData, setGraphData] = useState();

	useEffect( () => {
		getGraphDataByAPI();
	}, [props.duration] );

	const getGraphDataByAPI = () => {

		let option_name = 'graph_data';

		let url = `http://localhost/php/wp/wpdemo/wp-json/get/options/?name=${option_name}&key=${props.duration}`;

		fetch( url )
			.then( ( response ) => response.json() )
			.then( ( resp ) => {
				setGraphData(resp);
				console.log(resp);
			})
			.catch( ( err ) => {
				console.log(err);
		});
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
			<XAxis dataKey="Month" />
			<YAxis />
			<Tooltip />
			<Legend />
			<Line type="monotone" dataKey="Expense" stroke="#8884d8" activeDot={{ r: 8 }} />
		</LineChart>
	);
}

export default GraphUI;


