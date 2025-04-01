import HeaderNavigationItem from "~/Components/Header/HeaderNavigationItem";
import "./styles.css";
import React from "react";

interface HeaderNavigationListProps {
    activeOption: "home" | "participate";
}

const HeaderNavigationList: React.FC<HeaderNavigationListProps> = (props) => {
    const {activeOption} = props;
    return <ul>
        < HeaderNavigationItem display="Home" active={ activeOption === "home" } uri="/" />
        < HeaderNavigationItem display="Participe" active={activeOption === "participate"} uri="/contribute" />
    </ul>
}

export default HeaderNavigationList;