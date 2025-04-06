import React from "react";
import "./styles.css";

interface DefaultTitleProps {
    value: string,
    size: string
}

const DefaultTitle: React.FC<DefaultTitleProps> = (props) => {
    const {value, size} = props;
    return <h1 className="game-title" style={{fontSize: size}}>{value}</h1>
}

export default DefaultTitle;