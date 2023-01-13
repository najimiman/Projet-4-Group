import React, { Component } from "react";
import axios from "axios";
import { GroupAv } from './GroupAv';
// import BriefAv from "./BriefAv";
// import StudentAv from "./StudentAv";


export default class Header extends Component {
  constructor(props) {
    super(props);
    this.state = {
      years: [],
      group: '',
      studentCount: '',
      valueSelect: '',
      brief_affs: [],
      briefs_av: [],
      group_av: ''
    };
  }


  getDatayears = () => {
    axios.get("http://localhost:8000/api/group").then((res) => {
      this.setState({
        years: res.data
      });
    });
  };

  lastYear = () => {
    axios.get("http://localhost:8000/api/lastY").then((res) => {
      this.setState({
        lastY: res.data.year
      });
    });
  };

  componentDidMount() {
    this.getDatayears()
    this.lastYear()
  }

  getData = (e) => {
    axios.get('http://localhost:8000/api/group/' + e.target.value).then((res) => {
      this.setState({
        group: res.data.group,
        studentCount: res.data.studentCount,
        brief_affs: res.data.brief_aff[0],
        briefs_av: res.data.briefs,
        group_av: res.data.group_av
      });
    });
  };


  render() {
    console.log(this.state.brief_affs)
    return (
      <div>

        <div className="col-md-4">
          <h4>Année de formation</h4>
          <select onChange={this.getData} placeholder="année" id="input">
            {this.state.years.map((item) => (
              <option value={item.id}> Promotion : {item.formation_year}</option>
            ))}
          </select>
          <GroupAv data={this.state.group_av} />
        </div>


        {/* <div className="row info">
            <div className="col-md-4">
              <img src="" alt="logo"></img>
              <span>{this.state.group.name}</span>
            </div>
            <div className="col-md-4 info">
              <p>{this.state.studentCount} apprenants</p>
            </div>
            <div className="col-md-4"></div>
          </div> */}
        {/* <div className="col-md-6">
        <BriefAv data={this.state.briefs_av} />
        </div> */}
        {/* <div className="col-md-6 etatAvSt">
        <StudentAv data={this.state.brief_affs} />
        </div> */}

      </div>

    );
  }
}

