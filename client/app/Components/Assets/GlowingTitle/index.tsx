import React from "react";
import "./styles.css";

interface GlowingTitleProps {
    value: string,
    size: string
}

const GlowingTitle: React.FC<GlowingTitleProps> = (props) => {
    const {value, size} = props;
    return <h1 className="glowing-title" style={{fontSize: size}}>{value}</h1>
}

export default GlowingTitle;