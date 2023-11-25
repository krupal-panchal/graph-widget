import React, {useState} from 'react';
import GraphUI from './GraphUI';

const GraphWidget = () => {

	const [expenseDuration, setExpenseDuration] = useState('7d');

	const handleExpenseDuration = (event) => {
		setExpenseDuration(event.target.value);
	}

	const optionsData = [
		{ 'name' : '7 Days', 'value' : '7d' },
		{ 'name' : '15 Days', 'value' : '15d' },
		{ 'name' : '1 Month', 'value' : '1m' }
	];

	return (
		<div>
			<div className="graph-top-block">
				<span className="graph-title">Expense Data</span>
				<select name="expense" id="expenseDuration" value={expenseDuration} onChange={handleExpenseDuration}>
					{
						optionsData.map(
							item => (
								<option value={item.value}>{item.name}</option>
							)
						)
					}
				</select>
			</div>
			< hr />
			<GraphUI duration={expenseDuration}/>
		</div>
	 );
}

export default GraphWidget;