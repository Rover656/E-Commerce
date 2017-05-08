class ItemTypes {
  public function ItemTypeIdToName($id) {
    switch($id) {
      case 0:
        return "Digital Download";
        break;
      default:
        return;
        break;
    }
  }
  
  public function ItemTypeNameToId($name) {
    switch($name) {
      case "Digital Download":
        return 0;
        break;
      default:
        return;
        break;
    }
  }
}
